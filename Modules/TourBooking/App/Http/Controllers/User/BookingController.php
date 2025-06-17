<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\TourBooking\App\Models\Booking;
use Modules\TourBooking\App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;

final class BookingController extends Controller
{


    public function index(): View
    {
        $bookings = Booking::with(['service:id,title,location'])
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->paginate(15);
        return view('tourbooking::user.booking.index', compact('bookings'));
    }

    public function details(Request $request): View
    {
        $booking = Booking::with(['service.translation', 'user'])
            ->where('user_id', auth()->user()->id)
            ->findOrFail($request->id);

        return view('tourbooking::user.booking.details', compact('booking'));
    }
}
