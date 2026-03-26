<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('email_templates')->insertOrIgnore([
            [
                'id'          => 11,
                'name'        => 'Booking Placed',
                'subject'     => 'Booking Received - {{booking_code}}',
                'description' => '<p>Dear <strong>{{user_name}}</strong>,</p>
<p>Thank you for your booking! We have received your reservation and it is currently being processed.</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-out Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_out_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Guests:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{adults}} Adults, {{children}} Children</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Total Amount:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{total_amount}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Payment Method:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{payment_method}}</td></tr>
  <tr><td style="padding:8px;color:#666;">Payment Status:</td><td style="padding:8px;">{{payment_status}}</td></tr>
</table>
<p>We will notify you once your booking is confirmed.</p>
<p>Thank you for choosing <strong>{{site_name}}</strong>!</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 12,
                'name'        => 'Booking Confirmed',
                'subject'     => 'Your Booking is Confirmed - {{booking_code}}',
                'description' => '<p>Dear <strong>{{user_name}}</strong>,</p>
<p>Great news! Your booking has been <strong style="color:#27ae60;">confirmed</strong>. We look forward to welcoming you.</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-out Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_out_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Guests:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{adults}} Adults, {{children}} Children</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Total Amount:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{total_amount}}</td></tr>
  <tr><td style="padding:8px;color:#666;">Admin Notes:</td><td style="padding:8px;">{{admin_notes}}</td></tr>
</table>
<p>If you have any questions, please do not hesitate to contact us.</p>
<p>See you soon, <strong>{{site_name}}</strong>!</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 13,
                'name'        => 'Booking Cancelled',
                'subject'     => 'Booking Cancelled - {{booking_code}}',
                'description' => '<p>Dear <strong>{{user_name}}</strong>,</p>
<p>We regret to inform you that your booking has been <strong style="color:#e74c3c;">cancelled</strong>.</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-out Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_out_date}}</td></tr>
  <tr><td style="padding:8px;color:#666;">Cancellation Reason:</td><td style="padding:8px;">{{cancellation_reason}}</td></tr>
</table>
<p>If you believe this is a mistake or have any questions, please contact our support team.</p>
<p>We hope to serve you again, <strong>{{site_name}}</strong>.</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 14,
                'name'        => 'Booking Completed',
                'subject'     => 'Booking Completed - {{booking_code}}',
                'description' => '<p>Dear <strong>{{user_name}}</strong>,</p>
<p>Your booking has been marked as <strong style="color:#2980b9;">completed</strong>. We hope you had a wonderful experience!</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-out Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_out_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Guests:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{adults}} Adults, {{children}} Children</td></tr>
  <tr><td style="padding:8px;color:#666;">Total Amount:</td><td style="padding:8px;font-weight:bold;">{{total_amount}}</td></tr>
</table>
<p>We would love to hear your feedback. Please consider leaving a review!</p>
<p>Thank you for choosing <strong>{{site_name}}</strong>!</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 15,
                'name'        => 'New Booking (Admin)',
                'subject'     => 'New Booking Received - {{booking_code}}',
                'description' => '<p>Hello Admin,</p>
<p>A new booking has been placed on <strong>{{site_name}}</strong>. Please review the details below.</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Agency / Owner:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{agency_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Name:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{user_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Email:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{customer_email}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Phone:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{customer_phone}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-out Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_out_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Guests:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{adults}} Adults, {{children}} Children</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Total Amount:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{total_amount}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Payment Method:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{payment_method}}</td></tr>
  <tr><td style="padding:8px;color:#666;">Payment Status:</td><td style="padding:8px;">{{payment_status}}</td></tr>
</table>
<p>Please log in to the admin panel to manage this booking.</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 16,
                'name'        => 'New Booking (Agency)',
                'subject'     => 'New Booking for Your Service - {{booking_code}}',
                'description' => '<p>Hello,</p>
<p>You have received a new booking for one of your services on <strong>{{site_name}}</strong>.</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Name:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{user_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Email:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{customer_email}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Phone:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{customer_phone}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-out Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_out_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Guests:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{adults}} Adults, {{children}} Children</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Total Amount:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{total_amount}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Payment Method:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{payment_method}}</td></tr>
  <tr><td style="padding:8px;color:#666;">Payment Status:</td><td style="padding:8px;">{{payment_status}}</td></tr>
</table>
<p>Please log in to your agency panel to manage this booking.</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 17,
                'name'        => 'Booking Cancelled by User',
                'subject'     => 'Customer Cancelled Booking - {{booking_code}}',
                'description' => '<p>Hello,</p>
<p>A customer has <strong style="color:#e74c3c;">cancelled</strong> their booking. Details are below.</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Name:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{user_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Email:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{customer_email}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Customer Phone:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{customer_phone}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;color:#666;">Cancellation Reason:</td><td style="padding:8px;">{{cancellation_reason}}</td></tr>
</table>
<p>Please log in to your panel to review this cancellation.</p>
<p>— <strong>{{site_name}}</strong></p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 18,
                'name'        => 'Payment Confirmed',
                'subject'     => 'Payment Confirmed - {{booking_code}}',
                'description' => '<p>Dear <strong>{{user_name}}</strong>,</p>
<p>Your payment has been <strong style="color:#27ae60;">confirmed</strong> for the following booking.</p>
<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:14px;">
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;width:40%;">Booking Code:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{booking_code}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Service:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{service_name}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-in Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_in_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Check-out Date:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{check_out_date}}</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Guests:</td><td style="padding:8px;border-bottom:1px solid #eee;">{{adults}} Adults, {{children}} Children</td></tr>
  <tr><td style="padding:8px;border-bottom:1px solid #eee;color:#666;">Total Amount:</td><td style="padding:8px;border-bottom:1px solid #eee;font-weight:bold;">{{total_amount}}</td></tr>
  <tr><td style="padding:8px;color:#666;">Payment Method:</td><td style="padding:8px;">{{payment_method}}</td></tr>
</table>
<p>Your payment has been received and your reservation is secured.</p>
<p>Thank you for choosing <strong>{{site_name}}</strong>!</p>',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('email_templates')->whereIn('id', [11, 12, 13, 14, 15, 16, 17, 18])->delete();
    }
};
