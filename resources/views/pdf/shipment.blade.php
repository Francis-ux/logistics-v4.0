{{-- <!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="font-family: Arial, Helvetica, sans-serif;">

        <div>

            <table style="width:100%;">
                <tr style="width:100%;">
                    <td>
                        <img style="width:70%;" src="{{ public_path(config('assets.logo')) }}">
                    </td>

                    <td>
                        <img style="width: 100px; object-fit: cover;"
                            src="{{ public_path('assets/images/qr_code.png') }}">
                    </td>
                </tr>
            </table>

            <div style="background-color: red; color: white; font-size: 30px; font-weight: bolder;">
                <span style="font-family: Times New Roman, Times, serif;"> Shipment Receipt</span>
            </div>

            <div style="color: white; margin-top: 10px;">
                <span style=" background-color: red; padding:3px 40px 3px 0px;"> Tracking ID:
                    {{ $shipment->tracking_code }}</span>
                <span style="color: #DC505E;">Date of
                    shipment:{{ formatDate($shipment->departure_date) }}</span>
            </div>

            <div style="font-size: small; padding: 30px 0px; width: 100%;">
                <div>
                    <table style="width: 100%; color: #1E89FB;">
                        <tr>
                            <td> Sender:</td>
                            <td style="font-size: larger;">
                                <b>{{ $shipment->sender_name }}</b>
                            </td>

                            <td style="text-align: right;"> Receiver:</td>
                            <td style="font-size: larger;">
                                <b>{{ $shipment->client_name }}</b>
                            </td>

                        </tr>

                        <tr>
                            <td> Address:</td>
                            <td>{{ $shipment->sender_address }}</td>

                            <td> </td>
                            <td>{{ $shipment->client_address }}</td>
                        </tr>

                        <tr>
                            <td>Email:</td>
                            <td>{{ $shipment->sender_email }}</td>

                            <td></td>
                            <td>{{ $shipment->client_email }}</td>
                        </tr>

                        <tr>
                            <td>Phone:</td>
                            <td>{{ $shipment->sender_phone }}</td>

                            <td></td>
                            <td>{{ $shipment->client_phone }}</td>
                        </tr>

                        <tr>
                            <td>Amount:</td>
                            <td>{{ currency($shipment->currency, 'code') }}
                                {{ formatAmount($shipment->amount) }}
                            </td>

                            <td style="text-align: right;"><b>Pickup Location:</b></td>
                            <td>
                                {{ $shipment->shipped_to }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <table style="color: white; width: 100%;">
                <tr>
                    <td style="padding: 10px 5px; width: 40%; background-color: red;">
                        <span>
                            PARCEL DESCRIPTION
                        </span>
                    </td>
                    <td style=" padding: 10px 3px; width: 60%; background-color:#107481b9;">
                        <span>
                            EXPECTED DATE OF DELIVERY:
                            {{ formatDate($shipment->arrival_date) }}
                        </span>
                    </td>
                </tr>
            </table>

            <div>
                <P><b style="font-size: larger;">{{ $shipment->description }}</b></P>
                <p> <b>Weight:</b> {{ $shipment->weight }}Kg</p>
                <p> <b>Comment:</b> </br> {{ $shipment->comment }}</p>
            </div>

            <div style="width: 100%;">
                <p style="font-size: larger;">
                    Any shortage or damage must be notified withing 72hours of receipt of goods. Complaints can only
                    Be accepted if made in writing within 30days of receipt of goods. No goods may be returned without
                    Prior authorization from {{ config('app.name') }}
                </p>
            </div>

            <div style="display:flex;">

                <div style="margin-left: 5px;">
                    <table>
                        <tr>
                            <td>
                                <img src="{{ public_path('assets/images/paypal2.png') }}">
                            </td>
                            <td>
                                <div style=" font-size: smaller; color: rgb(145, 143, 143);">
                                    Credit & Debits Cards Accepted
                                </div>
                                <img src="{{ public_path('assets/images/paypal.png') }}">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="border-bottom: 2px solid black; height: 105px;">
                <span>
                    <img src="{{ public_path('assets/images/sign.png') }}">
                </span>
            </div>

            <div style="font-size: small; margin-left: 100px;">
                Signed
            </div>

            <!-- stamp image -->
            <div style="margin: -200px 0px 0px 0px; float: right;">
                <img src="{{ public_path('assets/images/dispatch.png') }}" style="width: 300px; object-fit: cover;">
            </div>

        </div>

    </body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Shipment Receipt</title>
    </head>

    <body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 20px;">

        <!-- Header -->
        <table style="width:100%; border-collapse: collapse; margin-bottom: 10px;">
            <tr>
                <!-- Logo -->
                <td style="width: 30%; vertical-align: middle;">
                    <img src="{{ public_path(config('assets.logo')) }}" alt="Logo" style="width: 150px;">
                </td>

                <!-- Contact -->
                <td style="width: 40%; vertical-align: middle; text-align: right; padding-right: 10px;">
                    <p style="margin: 0; font-size: 14px; font-weight: bold;">Contact Us</p>
                    <p style="margin: 2px 0; font-size: 10px;">{{ config('contact.address') }}</p>
                    <p style="margin: 2px 0; font-size: 10px;">{{ config('contact.email') }}</p>
                </td>

                <!-- QR Code -->
                <td style="width: 30%; text-align: right; vertical-align: middle;">
                    <img src="{{ public_path('assets/images/qr_code.png') }}" alt="QR Code" style="width: 80px;">
                </td>
            </tr>
        </table>

        <!-- Title -->
        <div style="background-color: red; color: white; font-size: 20px; font-weight: bold; padding: 6px 10px;">
            Shipment Receipt
        </div>

        <!-- Tracking Info -->
        <div style="margin-top: 10px; margin-bottom: 20px;">
            <span style="background-color: red; color: white; padding: 3px 10px;">
                Tracking ID: {{ $shipment->tracking_code }}
            </span>
            <span style="margin-left: 10px; color: #DC505E;">
                Date of shipment: {{ formatDate($shipment->departure_date) }}
            </span>
        </div>

        <!-- Sender/Receiver -->
        <table style="width:100%; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <td style="width: 15%; font-weight: bold;">Sender:</td>
                <td style="width: 35%;">{{ $shipment->sender_name }}</td>
                <td style="width: 15%; font-weight: bold; text-align: right;">Receiver:</td>
                <td style="width: 35%;">{{ $shipment->client_name }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Address:</td>
                <td>{{ $shipment->sender_address }}</td>
                <td></td>
                <td>{{ $shipment->client_address }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Email:</td>
                <td>{{ $shipment->sender_email }}</td>
                <td></td>
                <td>{{ $shipment->client_email }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Phone:</td>
                <td>{{ $shipment->sender_phone }}</td>
                <td></td>
                <td>{{ $shipment->client_phone }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Amount:</td>
                <td>
                    {{ currency($shipment->currency, 'code') }} {{ formatAmount($shipment->amount) }}
                </td>
                <td style="font-weight: bold; text-align: right;">Pickup Location:</td>
                <td>{{ $shipment->shipped_to }}</td>
            </tr>
        </table>

        <!-- Parcel Header -->
        <table style="width:100%; border-collapse: collapse; margin-bottom: 15px;">
            <tr>
                <td style="width:40%; background-color:red; color:white; padding:8px; font-weight:bold;">
                    PARCEL DESCRIPTION
                </td>
                <td style="width:60%; background-color:#107481; color:white; padding:8px;">
                    EXPECTED DATE OF DELIVERY: {{ formatDate($shipment->arrival_date) }}
                </td>
            </tr>
        </table>

        <!-- Parcel Details -->
        <p style="font-size: 14px; font-weight: bold;">{{ $shipment->description }}</p>
        <p><b>Weight:</b> {{ $shipment->weight }} Kg</p>
        <p><b>Comment:</b><br>{{ $shipment->comment }}</p>

        <!-- Disclaimer -->
        <div style="margin-top: 20px; font-size: 11px;">
            Any shortage or damage must be notified within 72 hours of receipt of goods.
            Complaints can only be accepted if made in writing within 30 days of receipt of goods.
            No goods may be returned without prior authorization from {{ config('app.name') }}.
        </div>

        <!-- Payment Info -->
        <table style="margin-top: 20px;">
            <tr>
                <td>
                    <img src="{{ public_path('assets/images/paypal2.png') }}" alt="PayPal2" style="width: 60px;">
                </td>
                <td style="padding-left: 10px;">
                    <div style="font-size: 10px; color: #777;">Credit & Debit Cards Accepted</div>
                    <img src="{{ public_path('assets/images/paypal.png') }}" alt="PayPal" style="width: 60px;">
                </td>
            </tr>
        </table>

        <!-- Signature -->
        <div style="margin-top: 40px; border-bottom: 2px solid black; height: 60px;">
            <img src="{{ public_path('assets/images/sign.png') }}" alt="Signature" style="height: 50px;">
        </div>
        <div style="font-size: 11px; margin-top: 5px; margin-left: 20px;">
            Signed
        </div>

        <!-- Stamp -->
        <div style="position: absolute; right: 40px; bottom: 80px;">
            <img src="{{ public_path('assets/images/dispatch.png') }}" alt="Dispatch" style="width: 150px;">
        </div>

    </body>

</html>