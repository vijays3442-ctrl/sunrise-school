<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Website Inquiry</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f9fa; margin: 0; padding: 24px; color: #333;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid #eaeaea; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        <!-- Header -->
        <tr>
            <td style="background-color: #103741; padding: 28px; text-align: center;">
                <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: bold;">Sunrise English Medium School</h1>
                <p style="color: #FE5D37; margin: 6px 0 0 0; font-size: 13px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">Website Inquiry Desk</p>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 32px 28px;">
                <h2 style="color: #103741; font-size: 18px; margin: 0 0 16px 0;">New Message from Website Contact Form</h2>
                <p style="color: #555555; font-size: 14px; line-height: 1.6; margin: 0 0 24px 0;">
                    A visitor has submitted a new inquiry. The details are as follows:
                </p>

                <!-- Details Table -->
                <table width="100%" cellpadding="10" cellspacing="0" style="background: #FFF5F3; border-radius: 12px; margin-bottom: 24px; border: 1px solid #fde2dc; font-size: 14px;">
                    <tr>
                        <td width="30%" style="color: #777777; font-weight: bold; border-bottom: 1px solid #fde2dc;">Sender Name:</td>
                        <td width="70%" style="color: #103741; font-weight: bold; border-bottom: 1px solid #fde2dc;">{{ $contactMessage->name }}</td>
                    </tr>
                    <tr>
                        <td style="color: #777777; font-weight: bold; border-bottom: 1px solid #fde2dc;">Sender Email:</td>
                        <td style="color: #103741; border-bottom: 1px solid #fde2dc;">
                            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ urlencode($contactMessage->subject) }}" style="color: #FE5D37; text-decoration: none;">{{ $contactMessage->email }}</a>
                        </td>
                    </tr>
                    @if($contactMessage->phone)
                    <tr>
                        <td style="color: #777777; font-weight: bold; border-bottom: 1px solid #fde2dc;">Sender Phone:</td>
                        <td style="color: #103741; border-bottom: 1px solid #fde2dc;">
                            <a href="tel:{{ $contactMessage->phone }}" style="color: #103741; text-decoration: none;">{{ $contactMessage->phone }}</a>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td style="color: #777777; font-weight: bold; border-bottom: 1px solid #fde2dc;">Subject:</td>
                        <td style="color: #103741; font-weight: bold; border-bottom: 1px solid #fde2dc;">{{ $contactMessage->subject }}</td>
                    </tr>
                    <tr>
                        <td style="color: #777777; font-weight: bold; vertical-align: top;">Message:</td>
                        <td style="color: #103741; line-height: 1.6;">{!! nl2br(e($contactMessage->message)) !!}</td>
                    </tr>
                </table>

                <!-- Actions -->
                <div style="text-align: center; margin-top: 28px;">
                    <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ urlencode($contactMessage->subject) }}" style="background-color: #FE5D37; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 14px; display: inline-block; margin-right: 10px;">
                        Reply to Sender
                    </a>
                    <a href="{{ url('/dashboard/contact-messages') }}" style="background-color: #103741; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 14px; display: inline-block;">
                        View in Admin
                    </a>
                </div>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="background-color: #f7f9fa; padding: 20px; text-align: center; border-top: 1px solid #eaeaea; color: #999999; font-size: 12px;">
                This automated notification was generated from the Sunrise English Medium School Website.
            </td>
        </tr>
    </table>
</body>
</html>
