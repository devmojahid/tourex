<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $mail_subject }}</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f9;font-family:Arial,Helvetica,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f6f9;">
  <tr>
    <td align="center" style="padding:30px 10px;">
      <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
        <!-- Header with logo -->
        <tr>
          <td align="center" style="background-color:#1a2f5e;padding:24px 30px;">
            @if($logo_url)
              <img src="{{ $logo_url }}" alt="{{ $site_name }}" style="max-height:55px;max-width:200px;">
            @else
              <h1 style="margin:0;color:#ffffff;font-size:22px;font-weight:700;letter-spacing:1px;">{{ $site_name }}</h1>
            @endif
          </td>
        </tr>
        <!-- Body -->
        <tr>
          <td style="padding:32px 36px 24px;color:#333333;font-size:15px;line-height:1.7;">
            {!! clean($mail_message) !!}
          </td>
        </tr>
        <!-- Footer -->
        <tr>
          <td style="background-color:#f8f9fa;padding:18px 36px;border-top:1px solid #e8ecf0;text-align:center;color:#888;font-size:12px;">
            &copy; {{ date('Y') }} {{ $site_name }}. {{ __('translate.All rights reserved') }}.
            <br>
            <span style="font-size:11px;color:#aaa;">{{ __('translate.This is an automated email, please do not reply') }}.</span>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
