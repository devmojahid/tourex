<?php

use Illuminate\Support\Facades\Route;
use Modules\SupportTicket\App\Http\Controllers\CourseQuery\Student\CourseQueryController as StudentCourseQueryController;
use Modules\SupportTicket\App\Http\Controllers\CourseQuery\Instructor\CourseQueryController as InstructorCourseQueryController;
use Modules\SupportTicket\App\Http\Controllers\Support\Admin\SupportTicketController as AdminSupportTicketController;
use Modules\SupportTicket\App\Http\Controllers\Support\User\SupportTicketController as UserSupportTicketController;
use Modules\SupportTicket\App\Http\Controllers\Support\Instructor\SupportTicketController as InstructorSupportTicketController;

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





Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function(){

    Route::resource('support-ticket', UserSupportTicketController::class);
    Route::post('support-ticket-message/{id}', [UserSupportTicketController::class, 'support_ticket_message'])->name('support-ticket-message');

    Route::resource('agency-support', StudentCourseQueryController::class);
    Route::post('agency-support-message/{id}', [StudentCourseQueryController::class, 'support_ticket_message'])->name('teacher-support-message');

});


Route::group(['as' => 'agency.', 'prefix' => 'agency', 'middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function(){

    Route::resource('support-ticket', InstructorSupportTicketController::class);
    Route::post('support-ticket-message/{id}', [InstructorSupportTicketController::class, 'support_ticket_message'])->name('support-ticket-message');

    Route::get('agency-supports', [InstructorCourseQueryController::class, 'index'])->name('teacher-supports');
    Route::get('agency-support/{id}', [InstructorCourseQueryController::class, 'show'])->name('teacher-support');
    Route::post('agency-support-message/{id}', [InstructorCourseQueryController::class, 'support_ticket_message'])->name('teacher-support-message');
    Route::put('agency-support-close/{id}', [InstructorCourseQueryController::class, 'close'])->name('teacher-support-close');

});


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'HtmlSpecialchars', 'MaintenanceMode']], function(){

    Route::get('support-tickets', [AdminSupportTicketController::class, 'index'])->name('support-tickets');
    Route::get('support-ticket/{id}', [AdminSupportTicketController::class, 'show'])->name('support-ticket');
    Route::post('support-ticket-message/{id}', [AdminSupportTicketController::class, 'support_ticket_message'])->name('support-ticket-message');
    Route::delete('support-ticket-delete/{id}', [AdminSupportTicketController::class, 'destroy'])->name('support-ticket-delete');
    Route::put('support-ticket-close/{id}', [AdminSupportTicketController::class, 'close'])->name('support-ticket-close');

});

