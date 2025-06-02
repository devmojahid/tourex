<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Controllers\Front;

use App\Enums\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\TourBooking\App\Models\Amenity;
use Modules\TourBooking\App\Models\Destination;
use Modules\TourBooking\App\Models\Review;
use Modules\TourBooking\App\Models\Service;
use Modules\TourBooking\App\Models\ServiceType;
use Modules\TourBooking\App\Repositories\ServiceRepository;
use Modules\TourBooking\App\Repositories\ServiceTypeRepository;

final class FrontServiceController extends Controller
{

    public function __construct(
        private ServiceRepository $serviceRepository,
        private ServiceTypeRepository $serviceTypeRepository,
    ) {}

    /**
     * Display the home page of the tour booking module.
     */
    public function index(): View
    {
        $featuredServices = Service::where('status', true)
            ->where('is_featured', true)
            ->with('thumbnail')
            ->take(8)
            ->get();

        $popularServices = Service::where('status', true)
            ->where('is_popular', true)
            ->with('thumbnail')
            ->take(8)
            ->get();

        $serviceTypes = ServiceType::where('status', true)
            ->with('thumbnail')
            ->take(6)
            ->get();

        $popularDestinations = Destination::where('status', true)
            ->where('is_popular', true)
            ->with('thumbnail')
            ->take(6)
            ->get();

        $latestReviews = Review::where('status', true)
            ->with(['service', 'user'])
            ->latest()
            ->take(6)
            ->get();

        return view('tourbooking::front.index', compact(
            'featuredServices',
            'popularServices',
            'serviceTypes',
            'popularDestinations',
            'latestReviews'
        ));
    }

    /**
     * Search for services.
     */
    public function search(Request $request): View
    {
        $query = Service::where('status', true)
            ->with(['thumbnail', 'serviceType', 'reviews']);

        // Apply search filters
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%")
                    ->orWhere('location', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('service_type')) {
            $query->where('service_type_id', $request->input('service_type'));
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%" . $request->input('location') . "%");
        }

        if ($request->filled('min_price')) {
            $query->where(function ($q) use ($request) {
                $q->where('full_price', '>=', $request->input('min_price'))
                    ->orWhere('discount_price', '>=', $request->input('min_price'))
                    ->orWhere('price_per_person', '>=', $request->input('min_price'));
            });
        }

        if ($request->filled('max_price')) {
            $query->where(function ($q) use ($request) {
                $q->where('full_price', '<=', $request->input('max_price'))
                    ->orWhere('discount_price', '<=', $request->input('max_price'))
                    ->orWhere('price_per_person', '<=', $request->input('max_price'));
            });
        }

        // Sort results
        $sort = $request->input('sort', 'newest');

        switch ($sort) {
            case 'price_low':
                $query->orderBy('discount_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('discount_price', 'desc');
                break;
            case 'rating':
                $query->withAvg('reviews', 'rating')
                    ->orderByDesc('reviews_avg_rating');
                break;
            case 'oldest':
                $query->oldest();
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $services = $query->paginate(12)->withQueryString();

        // Get filter options for the search form
        $serviceTypes = ServiceType::where('status', true)->get();
        $destinations = Destination::where('status', true)->get();

        return view('tourbooking::front.search', compact('services', 'serviceTypes', 'destinations'));
    }

    /**
     * Display all service types.
     */
    public function serviceTypes(): View
    {
        $serviceTypes = ServiceType::where('status', true)
            ->with('thumbnail')
            ->paginate(15);

        return view('tourbooking::front.service-types', compact('serviceTypes'));
    }

    /**
     * Display a specific service type with its services.
     */
    public function serviceTypeDetail(string $slug): View
    {
        $serviceType = ServiceType::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $services = Service::where('service_type_id', $serviceType->id)
            ->where('status', true)
            ->with(['thumbnail', 'reviews'])
            ->paginate(12);

        return view('tourbooking::front.service-type-detail', compact('serviceType', 'services'));
    }

    /**
     * Display all services.
     */
    public function allServices()
    {
        $serviceTypes = $this->serviceTypeRepository->getActiveNameId();

        $amenities = Amenity::where('status', true)->with('translation:id,amenity_id,lang_code,name')->get();
        $languages = Language::cases();
        $destinations = Destination::where('status', true)->get();

        return view('tourbooking::front.services.services', compact('serviceTypes', 'amenities', 'languages', 'destinations'));
    }

    /**
     * load all services.
     */
    public function loadServicesAjax(Request $request)
    {

        // dd($request->all());

        $isListView = $request->isListView;

        $allServices = Service::select('id', 'price_per_person', 'slug', 'location', 'is_featured', 'full_price', 'discount_price', 'is_new')
            ->where('status', true)
            ->with(['thumbnail:id,service_id,caption,file_path', 'translation:id,service_id,locale,title'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->whereHas('translation', function ($q) use ($request) {
                    $q->where('title', 'like', "%{$request->search}%");
                })
                    ->orWhere('location', 'like', "%{$request->search}%");
            })
            ->when($request->filled('service_type_ids') && is_array($request->service_type_ids), function ($query) use ($request) {
                return $query->whereIn('service_type_id', $request->service_type_ids);
            })
            ->when($request->filled('max_price'), function ($query) use ($request) {
                return $query->where('price_per_person', '<=', $request->max_price);
            })
            ->when($request->filled('min_price'), function ($query) use ($request) {
                return $query->where('price_per_person', '>=', $request->min_price);
            })
            ->when($request->filled('amenity_ids') && is_array($request->amenity_ids), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    foreach ($request->amenity_ids as $amenityId) {
                        $q->orWhereJsonContains('amenities', $amenityId);
                    }
                });
            })
            ->when($request->filled('languages') && is_array($request->languages), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    foreach ($request->languages as $language) {
                        $q->orWhereJsonContains('languages', $language);
                    }
                });
            })
            ->when($request->filled('destination_id'), function ($query) use ($request) {
                return $query->where('destination_id', $request->destination_id);
            })
            ->when($request->filled('checkIn'), function ($query) use ($request) {
                return $query->whereTime('check_in_time', $request->checkIn);
            })
            ->when($request->filled('checkOut'), function ($query) use ($request) {
                return $query->whereTime('check_out_time', $request->checkOut);
            })
            ->when($request->filled('rooms'), function ($query) use ($request) {
                return $query->where('room_count', $request->rooms);
            })
            ->when($request->filled('adults'), function ($query) use ($request) {
                return $query->where('adult_count', $request->adults);
            })
            ->when($request->filled('children'), function ($query) use ($request) {
                return $query->where('children_count', $request->children);
            })
            ->when($request->filled('destination_id'), function ($query) use ($request) {
                return $query->where('destination_id', $request->destination_id);
            })
            ->when($request->filled('sort_by'), function ($query) use ($request) {
                switch ($request->sort_by) {
                    case 'price_low':
                        $query->orderBy('price_per_person', 'asc');
                        break;
                    case 'price_high':
                        $query->orderBy('price_per_person', 'desc');
                        break;
                    case 'trending':
                        $query->orderBy('is_featured', 'desc');
                        break;
                    case 'popular':
                        $query->orderBy('is_popular', 'desc');
                        break;
                    case 'latest':
                        $query->orderBy('created_at', 'desc');
                        break;
                    case 'oldest':
                        $query->orderBy('created_at', 'asc');
                        break;
                    case 'location_asc':
                        $query->orderBy('location', 'asc');
                        break;
                    case 'location_desc':
                        $query->orderBy('location', 'desc');
                        break;
                    default:
                        $query->orderBy('created_at', 'desc');
                }
            }, function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->paginate(12);

        $view = view('tourbooking::front.services.services-item', compact('allServices', 'isListView'))->render();

        $customPaginationCount = customPaginationCount($allServices);

        return response()->json(
            [
                'success' => true,
                'message' => 'Services loaded successfully',
                'view' => $view,
                'customPaginationCount' => $customPaginationCount,
            ]
        );
    }

    /**
     * Display a specific service's details.
     */
    public function serviceDetail(string $slug): View
    {
        $service = Service::where('slug', $slug)
            ->where('status', true)
            ->with([
                'media',
                'serviceType',
                'reviews' => function ($query) {
                    $query->where('status', true);
                },
                'reviews.user',
                'extraCharges',
                'availabilities',
                'itineraries' => function ($query) {
                    $query->orderBy('day_number');
                }
            ])
            ->firstOrFail();

        // Get related services
        $relatedServices = Service::where('id', '!=', $service->id)
            ->where('service_type_id', $service->service_type_id)
            ->where('status', true)
            ->with(['thumbnail', 'reviews'])
            ->take(4)
            ->get();

        // Check if user has a completed booking for this service
        $canReview = false;

        if (Auth::check()) {
            $userId = Auth::id();
            $canReview = $service->bookings()
                ->where('user_id', $userId)
                ->where('booking_status', 'completed')
                ->where('is_reviewed', false)
                ->exists();
        }

        return view('tourbooking::front.services.service-detail', compact('service', 'relatedServices', 'canReview'));
    }

    /**
     * Filter services by category (tours, hotels, etc.).
     */
    private function getServicesByType(string $type): View
    {
        $serviceType = ServiceType::where('slug', $type)->firstOrFail();

        $services = Service::where('service_type_id', $serviceType->id)
            ->where('status', true)
            ->with(['thumbnail', 'reviews'])
            ->latest()
            ->paginate(12);

        $title = ucfirst($type);

        return view('tourbooking::front.services-by-type', compact('services', 'serviceType', 'title'));
    }

    /**
     * Display all tours.
     */
    public function tours(): View
    {
        return $this->getServicesByType('tours');
    }

    /**
     * Display all hotels.
     */
    public function hotels(): View
    {
        return $this->getServicesByType('hotels');
    }

    /**
     * Display all restaurants.
     */
    public function restaurants(): View
    {
        return $this->getServicesByType('restaurants');
    }

    /**
     * Display all rentals.
     */
    public function rentals(): View
    {
        return $this->getServicesByType('rentals');
    }

    /**
     * Display all activities.
     */
    public function activities(): View
    {
        return $this->getServicesByType('activities');
    }

    /**
     * Display all destinations.
     */
    public function destinations(): View
    {
        $destinations = Destination::where('status', true)
            ->with('thumbnail')
            ->paginate(12);

        return view('tourbooking::front.destinations', compact('destinations'));
    }

    /**
     * Display a specific destination with related services.
     */
    public function destinationDetail(string $slug): View
    {
        $destination = Destination::where('slug', $slug)
            ->where('status', true)
            ->with('thumbnail')
            ->firstOrFail();

        $services = Service::where('status', true)
            ->where('location', 'like', "%{$destination->name}%")
            ->with(['thumbnail', 'serviceType', 'reviews'])
            ->paginate(12);

        return view('tourbooking::front.destination-detail', compact('destination', 'services'));
    }

    /**
     * Store a new review for a service.
     */
    public function storeReview(Request $request, string $slug): RedirectResponse
    {
        $service = Service::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        // Verify the user has a completed booking for this service
        $booking = $service->bookings()
            ->where('user_id', Auth::id())
            ->where('booking_status', 'completed')
            ->where('is_reviewed', false)
            ->first();

        if (!$booking) {
            return back()->with('error', 'You must have a completed booking to review this service.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:100',
            'content' => 'required|string|min:10|max:1000',
        ]);

        $review = Review::create([
            'service_id' => $service->id,
            'booking_id' => $booking->id,
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => false, // Pending approval
        ]);

        $booking->update(['is_reviewed' => true]);

        return back()->with('success', 'Your review has been submitted and is pending approval.');
    }
}
