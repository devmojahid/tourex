<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_subject;
    public $mail_message;
    public $from_user;
    public $logo_url;
    public $site_name;

    public function __construct($mail_message, $mail_subject, $from_user = '')
    {
        $this->mail_message = $mail_message;
        $this->mail_subject = $mail_subject;
        $this->from_user    = $from_user;

        $setting         = Cache::get('setting');
        $logo            = $setting->logo ?? null;
        $this->logo_url  = $logo ? asset($logo) : null;
        $this->site_name = $setting->app_name ?? config('app.name', 'Tourex');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mail_subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.booking_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
