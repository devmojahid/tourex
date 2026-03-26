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
use Illuminate\Support\Facades\Auth;
use App\Helper\EmailHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Modules\GlobalSetting\App\Models\GlobalSetting;

final class BookingController extends Controller
{


    public function index(): View
    {
        $bookings = Booking::with(['service:id,title,location'])
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->get();

        return view('tourbooking::user.booking.index', compact('bookings'));
    }

    public function details(Request $request): View
    {
        $booking = Booking::with(['service.translation', 'user'])
            ->where('user_id', auth()->user()->id)
            ->findOrFail($request->id);

        return view('tourbooking::user.booking.details', compact('booking'));
    }

    /**
     * Cancel a booking.
     */
    public function cancelBooking(Request $request, $id): RedirectResponse
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->where('booking_status', '!=', 'cancelled')
            ->where('booking_status', '!=', 'completed')
            ->firstOrFail();

        $validated = $request->validate([
            'cancellation_reason' => 'required|string|max:500',
        ]);

        $booking->update([
            'booking_status' => 'cancelled',
            'cancelled_at'   => now(),
            'cancellation_reason' => $validated['cancellation_reason'],
        ]);

        // Notify admin and agency about the cancellation
        $booking->load(['service.user']);
        $siteName = Cache::get('setting')->app_name ?? config('app.name');
        $keywords = [
            'user_name'           => $booking->customer_name,
            'booking_code'        => $booking->booking_code,
            'service_name'        => $booking->service->translation->title ?? $booking->service->title ?? '',
            'check_in_date'       => $booking->check_in_date ? Carbon::parse($booking->check_in_date)->format('d M Y') : '',
            'customer_email'      => $booking->customer_email,
            'customer_phone'      => $booking->customer_phone,
            'cancellation_reason' => $validated['cancellation_reason'],
            'number_of_nights'    => $booking->duration_in_days ?? 1,
            'site_name'           => $siteName,
        ];

        // Notify admin
        $adminEmail = GlobalSetting::where('key', 'contact_message_mail')->value('value');
        if ($adminEmail) {
            EmailHelper::sendBookingEmail($adminEmail, 17, $keywords);
        }

        // Notify agency (service owner)
        if ($booking->service->user_id && $booking->service->user && $booking->service->user->email) {
            EmailHelper::sendBookingEmail($booking->service->user->email, 17, $keywords);
        }

        return redirect()->route('user.bookings.index')->with('success', 'Your booking has been cancelled.');
    }
}
