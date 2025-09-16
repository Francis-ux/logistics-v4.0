<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                margin: 0
            }

            .container {
                width: 100%;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <p>Dear {{ $shipment->client_name }},</p>
            <p>Good day!</p>
            <p>We trust this mail meets you well. This is to bring to your notice that your shipment with tracking
                number <strong>{{ $shipment->tracking_code }}</strong> from
                <strong>{{ $shipment->sender_name }}</strong>, current status is
                <strong>{{ $shipment->status->value }}</strong>. Please visit <a
                    href="{{ route('tracking.show', $shipment->uuid) }}" target="_blank">{{ config('app.url') }}</a>
                for more details.
            </p>
            <p>Thank you for choosing {{ config('app.name') }}.</p>
            <p><strong class="text-uppercase text-warning">{{ config('app.name') }}</strong></p>
            <p>This email should not be used by anyone who is not the original intended recipient. It may contain
                confidential, proprietary or legally information.</p>
        </div>
    </body>

</html>
