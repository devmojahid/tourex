<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\TourBooking\App\Models\Booking;
use Modules\TourBooking\App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Modules\TourBooking\App\Models\ExtraCharge;
use App\Helper\EmailHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

final class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $myServicesIds = Service::where('user_id', auth()->user()->id)->pluck('id')->toArray();

        $bookings = Booking::with(['service', 'user'])
            ->whereIn('service_id', $myServicesIds)
            ->latest()
            ->get();

        return view('tourbooking::agency.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $services = Service::where('status', true)->get();

        return view('tourbooking::agency.bookings.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'nullable|date|after_or_equal:check_in_date',
            'check_in_time' => 'nullable',
            'check_out_time' => 'nullable',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'infants' => 'nullable|integer|min:0',
            'service_price' => 'required|numeric|min:0',
            'child_price' => 'nullable|numeric|min:0',
            'infant_price' => 'nullable|numeric|min:0',
            'extra_charges' => 'nullable|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'paid_amount' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|string',
            'payment_status' => 'required|in:pending,completed',
            'booking_status' => 'required|in:pending,confirmed,cancelled,completed',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'nullable|string',
            'customer_notes' => 'nullable|string',
            'admin_notes' => 'nullable|string',
        ]);

        // Generate booking code
        $validated['booking_code'] = Booking::generateBookingCode();

        // Calculate due amount
        $validated['due_amount'] = $validated['total'] - ($validated['paid_amount'] ?? 0);

        $booking = Booking::create($validated);

        return redirect()->route('agency.tourbooking.bookings.show', $booking)
            ->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking): View
    {
        // Load relationships
        $booking->load(['service', 'user']);

        // Check if the service belongs to the current user
        if ($booking->service->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to booking.');
        }

        // Load extra services
        $extra_services = ExtraCharge::whereIn('id', $booking?->extra_services ?? [])
            ->where('status', true)
            ->get();

        return view('tourbooking::agency.bookings.details', compact('booking', 'extra_services'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking): View
    {
        $booking->load(['service', 'user']);
        $services = Service::where('status', true)->get();

        return view('tourbooking::agency.bookings.edit', compact('booking', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'nullable|date|after_or_equal:check_in_date',
            'check_in_time' => 'nullable',
            'check_out_time' => 'nullable',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'infants' => 'nullable|integer|min:0',
            'service_price' => 'required|numeric|min:0',
            'child_price' => 'nullable|numeric|min:0',
            'infant_price' => 'nullable|numeric|min:0',
            'extra_charges' => 'nullable|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'paid_amount' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|string',
            'payment_status' => 'required|in:pending,completed',
            'booking_status' => 'required|in:pending,confirmed,cancelled,completed',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'nullable|string',
            'customer_notes' => 'nullable|string',
            'admin_notes' => 'nullable|string',
        ]);

        // Calculate due amount
        $validated['due_amount'] = $validated['total'] - ($validated['paid_amount'] ?? 0);

        // Capture old statuses before update for email comparison
        $oldBookingStatus = $booking->booking_status;
        $oldPaymentStatus = $booking->payment_status;

        // Set timestamps for status changes
        if ($booking->booking_status !== $validated['booking_status']) {
            switch ($validated['booking_status']) {
                case 'confirmed':
                    $validated['confirmed_at'] = now();
                    break;
                case 'cancelled':
                    $validated['cancelled_at'] = now();
                    break;
                case 'completed':
                    $validated['completed_at'] = now();
                    break;
            }
        }

        $booking->update($validated);

        // Send email if booking status changed
        if ($oldBookingStatus !== $validated['booking_status']) {
            $booking->load(['service.user']);
            $siteName = Cache::get('setting')->app_name ?? config('app.name');
            $keywords = [
                'user_name'           => $booking->customer_name,
                'booking_code'        => $booking->booking_code,
                'service_name'        => $booking->service->translation->title ?? $booking->service->title ?? '',
                'check_in_date'       => $booking->check_in_date ? Carbon::parse($booking->check_in_date)->format('d M Y') : '',
                'check_out_date'      => $booking->check_out_date ? Carbon::parse($booking->check_out_date)->format('d M Y') : '',
                'adults'              => $booking->adults ?? 0,
                'children'            => $booking->children ?? 0,
                'total_amount'        => number_format((float) $booking->total, 2),
                'payment_method'      => $booking->payment_method ?? '',
                'payment_status'      => $booking->payment_status ?? '',
                'booking_status'      => $validated['booking_status'],
                'admin_notes'         => $validated['admin_notes'] ?? '',
                'cancellation_reason' => $validated['admin_notes'] ?? '',
                'site_name'           => $siteName,
            ];
            switch ($validated['booking_status']) {
                case 'confirmed':
                    EmailHelper::sendBookingEmail($booking->customer_email, 12, $keywords);
                    break;
                case 'cancelled':
                    EmailHelper::sendBookingEmail($booking->customer_email, 13, $keywords);
                    break;
                case 'completed':
                    EmailHelper::sendBookingEmail($booking->customer_email, 14, $keywords);
                    break;
            }
        }

        // Send payment confirmed email if payment status changed to completed
        if ($oldPaymentStatus !== $validated['payment_status'] && $validated['payment_status'] === 'completed') {
            $booking->load(['service.user']);
            $siteName = Cache::get('setting')->app_name ?? config('app.name');
            $keywords = [
                'user_name'      => $booking->customer_name,
                'booking_code'   => $booking->booking_code,
                'service_name'   => $booking->service->translation->title ?? $booking->service->title ?? '',
                'check_in_date'  => $booking->check_in_date ? Carbon::parse($booking->check_in_date)->format('d M Y') : '',
                'check_out_date' => $booking->check_out_date ? Carbon::parse($booking->check_out_date)->format('d M Y') : '',
                'adults'         => $booking->adults ?? 0,
                'children'       => $booking->children ?? 0,
                'total_amount'   => number_format((float) $booking->total, 2),
                'payment_method' => $booking->payment_method ?? '',
                'site_name'      => $siteName,
            ];
            EmailHelper::sendBookingEmail($booking->customer_email, 18, $keywords);
        }

        return redirect()->route('agency.tourbooking.bookings.show', $booking)
            ->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        $notify_message = trans('translate.Booking deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('agency.tourbooking.bookings.index')->with($notify_message);
    }

    /**
     * Display bookings filtered by status.
     */
    public function getByStatus(string $status): View
    {
        $bookings = Booking::with(['service', 'user'])
            ->where('booking_status', $status)
            ->latest()
            ->paginate(15);

        return view('tourbooking::agency.bookings.index', compact('bookings'))
            ->with('statusFilter', $status);
    }

    /**
     * Display pending bookings.
     */
    public function pending(): View
    {
        return $this->getByStatus('pending');
    }

    /**
     * Display confirmed bookings.
     */
    public function confirmed(): View
    {
        return $this->getByStatus('confirmed');
    }

    /**
     * Display completed bookings.
     */
    public function completed(): View
    {
        return $this->getByStatus('completed');
    }

    /**
     * Display cancelled bookings.
     */
    public function cancelled(): View
    {
        return $this->getByStatus('cancelled');
    }

    /**
     * Update booking status.
     */
    public function updateStatus(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'booking_status' => 'required|in:pending,confirmed,cancelled,completed',
            'admin_notes' => 'nullable|string',
        ]);

        // Set timestamps for status changes
        if ($booking->booking_status !== $validated['booking_status']) {
            switch ($validated['booking_status']) {
                case 'confirmed':
                    $validated['confirmed_at'] = now();
                    break;
                case 'cancelled':
                    $validated['cancelled_at'] = now();
                    break;
                case 'completed':
                    $validated['completed_at'] = now();
                    break;
            }
        }

        $oldBookingStatus = $booking->booking_status;

        $booking->update($validated);

        // Send email notification based on new status
        if ($oldBookingStatus !== $validated['booking_status']) {
            $booking->load(['service.user']);
            $siteName = Cache::get('setting')->app_name ?? config('app.name');
            $keywords = [
                'user_name'           => $booking->customer_name,
                'booking_code'        => $booking->booking_code,
                'service_name'        => $booking->service->translation->title ?? $booking->service->title ?? '',
                'check_in_date'       => $booking->check_in_date ? Carbon::parse($booking->check_in_date)->format('d M Y') : '',
                'check_out_date'      => $booking->check_out_date ? Carbon::parse($booking->check_out_date)->format('d M Y') : '',
                'adults'              => $booking->adults ?? 0,
                'children'            => $booking->children ?? 0,
                'total_amount'        => number_format((float) $booking->total, 2),
                'payment_method'      => $booking->payment_method ?? '',
                'payment_status'      => $booking->payment_status ?? '',
                'booking_status'      => $validated['booking_status'],
                'admin_notes'         => $validated['admin_notes'] ?? '',
                'cancellation_reason' => $validated['admin_notes'] ?? '',
                'site_name'           => $siteName,
            ];
            switch ($validated['booking_status']) {
                case 'confirmed':
                    EmailHelper::sendBookingEmail($booking->customer_email, 12, $keywords);
                    break;
                case 'cancelled':
                    EmailHelper::sendBookingEmail($booking->customer_email, 13, $keywords);
                    break;
                case 'completed':
                    EmailHelper::sendBookingEmail($booking->customer_email, 14, $keywords);
                    break;
            }
        }

        return back()->with('success', 'Booking status updated successfully.');
    }

    /**
     * Update payment status.
     */
    public function updatePaymentStatus(Request $request, Booking $booking): RedirectResponse
    {
        $validated = $request->validate([
            'payment_status' => 'required|in:pending,completed,confirmed,cancelled'
        ]);

        $oldPaymentStatus = $booking->payment_status;

        $booking->update($validated);

        // Send payment confirmed email when payment status changes to completed
        if ($oldPaymentStatus !== $validated['payment_status'] && $validated['payment_status'] === 'completed') {
            $booking->load(['service.user']);
            $siteName = Cache::get('setting')->app_name ?? config('app.name');
            $keywords = [
                'user_name'      => $booking->customer_name,
                'booking_code'   => $booking->booking_code,
                'service_name'   => $booking->service->translation->title ?? $booking->service->title ?? '',
                'check_in_date'  => $booking->check_in_date ? Carbon::parse($booking->check_in_date)->format('d M Y') : '',
                'check_out_date' => $booking->check_out_date ? Carbon::parse($booking->check_out_date)->format('d M Y') : '',
                'adults'         => $booking->adults ?? 0,
                'children'       => $booking->children ?? 0,
                'total_amount'   => number_format((float) $booking->total, 2),
                'payment_method' => $booking->payment_method ?? '',
                'site_name'      => $siteName,
            ];
            EmailHelper::sendBookingEmail($booking->customer_email, 18, $keywords);
        }

        return back()->with('success', 'Payment status updated successfully.');
    }

    /**
     * Generate an invoice for the booking.
     */
    public function invoice(Booking $booking): View
    {
        $booking->load(['service', 'user', 'service.serviceType']);

        return view('tourbooking::agency.bookings.invoice', compact('booking'));
    }

    /**
     * Generate a PDF invoice for the booking.
     */
    public function downloadInvoicePdf(Booking $booking)
    {
        $booking->load(['service', 'user', 'service.serviceType']);

        // Set paper size and orientation
        $pdf = PDF::loadView('tourbooking::agency.bookings.invoice', compact('booking'))
            ->setPaper('a4')
            ->setOption('margin-top', 10)
            ->setOption('margin-right', 10)
            ->setOption('margin-bottom', 10)
            ->setOption('margin-left', 10);

        // Generate a filename for the PDF
        $filename = 'invoice-' . $booking->booking_code . '.pdf';

        // Return the PDF as a download
        return $pdf->download($filename);
    }

    public function bookingConfirm(Request $request)
    {
        $bookingId = $request->input('id');

        $booking = Booking::find($bookingId);
        $booking->load(['service.user']);

        $booking->update([
            'booking_status' => 'confirmed',
            'confirmed_at'   => now(),
            'admin_notes'    => $request->input('confirmation_message') ?? null,
        ]);

        // Send confirmation email to customer
        $siteName = Cache::get('setting')->app_name ?? config('app.name');
        $keywords = [
            'user_name'      => $booking->customer_name,
            'booking_code'   => $booking->booking_code,
            'service_name'   => $booking->service->translation->title ?? $booking->service->title ?? '',
            'check_in_date'  => $booking->check_in_date ? Carbon::parse($booking->check_in_date)->format('d M Y') : '',
            'check_out_date' => $booking->check_out_date ? Carbon::parse($booking->check_out_date)->format('d M Y') : '',
            'adults'         => $booking->adults ?? 0,
            'children'       => $booking->children ?? 0,
            'total_amount'   => number_format((float) $booking->total, 2),
            'payment_method' => $booking->payment_method ?? '',
            'payment_status' => $booking->payment_status ?? '',
            'booking_status' => 'confirmed',
            'admin_notes'    => $request->input('confirmation_message') ?? '',
            'site_name'      => $siteName,
        ];
        EmailHelper::sendBookingEmail($booking->customer_email, 12, $keywords);

        $notify_message = trans('translate.Booking Confirmed Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function bookingCancel(Request $request)
    {
        $bookingId = $request->input('id');

        $booking = Booking::find($bookingId);
        $booking->load(['service.user']);

        $booking->update([
            'booking_status'      => 'cancelled',
            'cancelled_at'        => now(),
            'cancellation_reason' => $request->input('cancellation_reason') ?? null,
        ]);

        // Send cancellation email to customer
        $siteName = Cache::get('setting')->app_name ?? config('app.name');
        $keywords = [
            'user_name'           => $booking->customer_name,
            'booking_code'        => $booking->booking_code,
            'service_name'        => $booking->service->translation->title ?? $booking->service->title ?? '',
            'check_in_date'       => $booking->check_in_date ? Carbon::parse($booking->check_in_date)->format('d M Y') : '',
            'check_out_date'      => $booking->check_out_date ? Carbon::parse($booking->check_out_date)->format('d M Y') : '',
            'cancellation_reason' => $request->input('cancellation_reason') ?? '',
            'site_name'           => $siteName,
        ];
        EmailHelper::sendBookingEmail($booking->customer_email, 13, $keywords);

        $notify_message = trans('translate.Booking Cancelled Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }
}
