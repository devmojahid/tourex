<?php

namespace App\Helper;

use Modules\EmailSetting\App\Models\EmailSetting;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\BookingMail;

class EmailHelper
{
    public static function mail_setup()
    {
        $setting_data = EmailSetting::all();

        $email_setting = array();

        foreach ($setting_data as $data_item) {
            $email_setting[$data_item->key] = $data_item->value;
        }

        $email_setting = (object) $email_setting;

        $setting = [
            'transport'    => 'smtp',
            'host'         => $email_setting->mail_host,
            'port'         => $email_setting->mail_port,
            'encryption'   => $email_setting->mail_encryption,
            'username'     => $email_setting->smtp_username,
            'password'     => $email_setting->smtp_password,
            'timeout'      => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN')
        ];

        config(['mail.mailers.smtp' => $setting]);
        config(['mail.from.address' => $email_setting->email]);
        config(['mail.from.name' => $email_setting->sender_name]);
    }

    /**
     * Send a booking-related email using an EmailTemplate.
     *
     * @param string $recipientEmail  Recipient email address
     * @param int    $templateId      ID in email_templates table (11–18)
     * @param array  $keywords        ['keyword_name' => 'replacement_value']
     */
    public static function sendBookingEmail(string $recipientEmail, int $templateId, array $keywords = []): void
    {
        if (empty($recipientEmail)) {
            return;
        }

        try {
            $template = EmailTemplate::find($templateId);
            if (!$template) {
                return;
            }

            $message = $template->description;
            $subject = $template->subject;

            foreach ($keywords as $key => $value) {
                $message = str_replace('{{' . $key . '}}', (string) $value, $message);
                $subject = str_replace('{{' . $key . '}}', (string) $value, $subject);
            }

            $settingData = EmailSetting::all();
            $emailSetting = [];
            foreach ($settingData as $item) {
                $emailSetting[$item->key] = $item->value;
            }
            $emailSetting = (object) $emailSetting;

            static::mail_setup();

            Mail::to($recipientEmail)->send(new BookingMail($message, $subject, $emailSetting->sender_name ?? ''));
        } catch (\Exception $e) {
            Log::error('BookingMail send failed [template=' . $templateId . ', to=' . $recipientEmail . ']: ' . $e->getMessage());
        }
    }
}
