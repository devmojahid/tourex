<?php

use Illuminate\Support\Facades\Route;
use Modules\TourBooking\App\Http\Controllers\Admin\ServiceTypeController;
use Modules\TourBooking\App\Http\Controllers\Admin\ServiceController;
use Modules\TourBooking\App\Http\Controllers\Admin\BookingController;
use Modules\TourBooking\App\Http\Controllers\Admin\DestinationController;
use Modules\TourBooking\App\Http\Controllers\Admin\CouponController;
use Modules\TourBooking\App\Http\Controllers\Admin\ReviewController;
use Modules\TourBooking\App\Http\Controllers\Admin\ReportController;
use Modules\TourBooking\App\Http\Controllers\Front\FrontServiceController;
use Modules\TourBooking\App\Http\Controllers\Front\FrontBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('tourbooking', TourBookingController::class)->names('tourbooking');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['as'=> 'admin.tourbooking.', 'prefix' => 'admin/tourbooking', 'middleware' => ['auth:admin']], function () {
    // Service Types
    Route::resource('service-types', ServiceTypeController::class);
    
    // Services
    Route::resource('services', ServiceController::class);
    Route::get('services/type/{type}', [ServiceController::class, 'getByType'])->name('services.by-type');
    Route::get('services/tours', [ServiceController::class, 'tours'])->name('services.tours');
    Route::get('services/hotels', [ServiceController::class, 'hotels'])->name('services.hotels');
    Route::get('services/restaurants', [ServiceController::class, 'restaurants'])->name('services.restaurants');
    Route::get('services/rentals', [ServiceController::class, 'rentals'])->name('services.rentals');
    Route::get('services/activities', [ServiceController::class, 'activities'])->name('services.activities');
    
    // Service Media
    Route::post('services/{service}/media', [ServiceController::class, 'storeMedia'])->name('services.media.store');
    Route::delete('services/media/{media}', [ServiceController::class, 'deleteMedia'])->name('services.media.destroy');
    Route::post('services/media/{media}/set-thumbnail', [ServiceController::class, 'setThumbnail'])->name('services.media.set-thumbnail');
    Route::get('services/{service}/media', [ServiceController::class, 'showMedia'])->name('services.media');
    
    // Itineraries
    Route::get('services/{service}/itineraries', [ServiceController::class, 'showItineraries'])->name('services.itineraries');
    Route::post('services/{service}/itineraries', [ServiceController::class, 'storeItinerary'])->name('services.itineraries.store');
    Route::put('services/itineraries/{itinerary}', [ServiceController::class, 'updateItinerary'])->name('services.itineraries.update');
    Route::delete('services/itineraries/{itinerary}', [ServiceController::class, 'deleteItinerary'])->name('services.itineraries.destroy');
    
    // Extra Charges
    Route::get('services/{service}/extra-charges', [ServiceController::class, 'showExtraCharges'])->name('services.extra-charges');
    Route::post('services/{service}/extra-charges', [ServiceController::class, 'storeExtraCharge'])->name('services.extra-charges.store');
    Route::put('services/extra-charges/{charge}', [ServiceController::class, 'updateExtraCharge'])->name('services.extra-charges.update');
    Route::delete('services/extra-charges/{charge}', [ServiceController::class, 'deleteExtraCharge'])->name('services.extra-charges.destroy');
    
    // Availability
    Route::get('services/{service}/availability', [ServiceController::class, 'showAvailability'])->name('services.availability');
    Route::post('services/{service}/availability', [ServiceController::class, 'storeAvailability'])->name('services.availability.store');
    Route::put('services/availability/{availability}', [ServiceController::class, 'updateAvailability'])->name('services.availability.update');
    Route::delete('services/availability/{availability}', [ServiceController::class, 'deleteAvailability'])->name('services.availability.destroy');
    
    // Booking Management
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::post('bookings/{booking}/payment-status', [BookingController::class, 'updatePaymentStatus'])->name('bookings.payment-status');
    Route::get('bookings/{booking}/invoice', [BookingController::class, 'invoice'])->name('bookings.invoice');
    Route::get('bookings/{booking}/download-invoice', [BookingController::class, 'downloadInvoicePdf'])->name('bookings.download-invoice');
    Route::get('bookings/status/{status}', [BookingController::class, 'getByStatus'])->name('bookings.status');
    
    // Destinations
    Route::resource('destinations', DestinationController::class);
    Route::put('destinations/{destination}/status', [DestinationController::class, 'updateStatus'])->name('destinations.update-status');
    Route::put('destinations/{destination}/featured', [DestinationController::class, 'updateFeatured'])->name('destinations.update-featured');
    
    // Coupons
    Route::resource('coupons', CouponController::class);
    
    // Reviews
    Route::resource('reviews', ReviewController::class)->except(['create', 'store']);
    Route::put('reviews/{review}/approve', [ReviewController::class, 'approve'])->name('reviews.approve');
    Route::put('reviews/{review}/reject', [ReviewController::class, 'reject'])->name('reviews.reject');
    
    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/bookings', [ReportController::class, 'bookings'])->name('reports.bookings');
    Route::get('reports/revenue', [ReportController::class, 'revenue'])->name('reports.revenue');
    Route::get('reports/services', [ReportController::class, 'services'])->name('reports.services');
    Route::get('reports/popular-destinations', [ReportController::class, 'popularDestinations'])->name('reports.popular-destinations');
    Route::get('reports/export/{type}', [ReportController::class, 'export'])->name('reports.export');
});

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::group(['as'=> 'front.tourbooking.', 'prefix' => 'tourbooking', 'middleware' => ['web']], function () {
    // Home/Search Page
    Route::get('/', [FrontServiceController::class, 'index'])->name('home');
    Route::get('/search', [FrontServiceController::class, 'search'])->name('search');
    
    // Service Types
    Route::get('/types', [FrontServiceController::class, 'serviceTypes'])->name('service-types');
    Route::get('/types/{slug}', [FrontServiceController::class, 'serviceTypeDetail'])->name('service-types.show');
    
    // Services
    Route::get('/services', [FrontServiceController::class, 'allServices'])->name('services');
    Route::get('/services/{slug}', [FrontServiceController::class, 'serviceDetail'])->name('services.show');
    Route::get('/tours', [FrontServiceController::class, 'tours'])->name('tours');
    Route::get('/hotels', [FrontServiceController::class, 'hotels'])->name('hotels');
    Route::get('/restaurants', [FrontServiceController::class, 'restaurants'])->name('restaurants');
    Route::get('/rentals', [FrontServiceController::class, 'rentals'])->name('rentals');
    Route::get('/activities', [FrontServiceController::class, 'activities'])->name('activities');
    
    // Destinations
    Route::get('/destinations', [FrontServiceController::class, 'destinations'])->name('destinations');
    Route::get('/destinations/{slug}', [FrontServiceController::class, 'destinationDetail'])->name('destinations.show');
    
    // Booking
    Route::get('/book/{slug}', [FrontBookingController::class, 'bookingForm'])->name('book');
    Route::post('/book/{slug}', [FrontBookingController::class, 'processBooking'])->name('process-booking');
    Route::get('/booking/confirm/{code}', [FrontBookingController::class, 'confirmBooking'])->name('confirm-booking');
    Route::get('/booking/success/{code}', [FrontBookingController::class, 'bookingSuccess'])->name('booking-success');
    Route::get('/booking/cancel/{code}', [FrontBookingController::class, 'bookingCancel'])->name('booking-cancel');
    
    // Reviews
    Route::post('/services/{slug}/reviews', [FrontServiceController::class, 'storeReview'])->name('reviews.store');
    
    // Availability Check
    Route::post('/check-availability', [FrontBookingController::class, 'checkAvailability'])->name('check-availability');
    
    // Coupons
    Route::post('/validate-coupon', [FrontBookingController::class, 'validateCoupon'])->name('validate-coupon');
    
    // User Bookings (Protected by auth middleware)
    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('/my-bookings', [FrontBookingController::class, 'myBookings'])->name('my-bookings');
        Route::get('/my-bookings/{code}', [FrontBookingController::class, 'bookingDetails'])->name('my-bookings.show');
        Route::get('/my-bookings/{code}/invoice', [FrontBookingController::class, 'invoice'])->name('my-bookings.invoice');
        Route::get('/my-bookings/{code}/download-invoice', [FrontBookingController::class, 'downloadInvoicePdf'])->name('my-bookings.download-invoice');
        Route::post('/my-bookings/{code}/cancel', [FrontBookingController::class, 'cancelBooking'])->name('my-bookings.cancel');
        Route::post('/my-bookings/{code}/review', [FrontBookingController::class, 'leaveReview'])->name('my-bookings.review');
    });
});
