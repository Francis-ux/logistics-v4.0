<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Print Invoice</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Delaware Depository Service" />
        <meta name="keywords" content="Courier Delivery & Logistic Company" />
        <meta name="author" content="Viz">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="{{ asset('assets/invoice/css/bootstrap2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
        <link href="{{ asset('assets/invoice/css/print-invoice.min.css') }}" rel="stylesheet" type="text/css" />

        <style>
            #background {
                position: absolute;
                z-index: 0;
                display: block;
                min-height: 70%;
                min-width: 70%;
            }

            #bg-text {
                color: grey;
                font-size: 36px;
                transform: rotate(300deg);
                -webkit-transform: rotate(300deg);
            }
        </style>
    </head>

    <body style="background-color:teal;" onload="window.print();">

        <div class="wrapper" id="background">
            <p id="bg-text">Certified True Copy</p>

            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <span>
                                <img src="{{ asset(config('assets.logo')) }}" width="190" height="85"
                                    alt="Company Logo">
                                <img class="pull-right" src="{{ asset('assets/invoice/images/banner1.png') }}"
                                    height="185" alt="Banner">
                                <h3 style="color:red;"><strong>Tracking Number: {{ $shipment->tracking_code }}</strong>
                                </h3>
                            </span>
                        </h2>
                    </div>
                </div>

                <!-- company info -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <center>
                                <strong style="color:green;">
                                    {{ config('app.name') }}<br>
                                    Address: {{ config('contact.address') ?? 'N/A' }}<br>
                                    Email: {{ config('contact.email') }}<br>
                                    Company Website: {{ parse_url(config('app.url'), PHP_URL_HOST) }}
                                </strong>
                            </center>
                        </h2>
                    </div>
                </div>

                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong style="color:blue;">FROM (SENDER)</strong>
                        <address>
                            <h3><strong style="color:green;">{{ $shipment->sender_name }}</strong></h3>
                            <b>Address:</b> {{ $shipment->sender_address }}<br>
                            <b>Phone No:</b> {{ $shipment->sender_phone }}<br>
                            <b>Origin Office:</b> {{ $shipment->shipped_from }}
                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <strong style="color:blue;">TO (CONSIGNEE)</strong>
                        <address>
                            <h3><strong style="color:green;">{{ $shipment->client_name }}</strong></h3>
                            <b>Address:</b> {{ $shipment->client_address }}<br>
                            <b>Phone:</b> {{ $shipment->client_phone }}<br>
                            <b>Destination Office:</b> {{ $shipment->shipped_to }}
                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <center>
                            {{-- <img src="{{ asset('assets/invoice/images/barcode810e.png') }}" alt="Barcode"><br>
                            <strong>{{ $shipment->tracking_code }}</strong><br> --}}

                            {{-- Bar code --}}
                            <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $shipment->tracking_code }}&code=Code128&dpi=96"
                                alt="Barcode">

                            {{-- Gr Code --}}
                            {{-- <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $shipment->tracking_code }}&code=QRCode&dpi=96"
                                alt="QR Code"> --}}

                        </center>
                        <br>
                        <b>Order Status:</b> <span
                            class="{{ $shipment->status->badge() }}">{{ $shipment->status->label() }}</span><br>
                        {{-- <b>Order ID:</b> {{ $shipment->id }}<br> --}}
                        <b>Est. Delivery Date:</b> {{ formatDate($shipment->arrival_date) }}<br>
                        <b>Payment Mode:</b> <small class="label label-danger"><i class="fa fa-money"></i>
                            {{ $shipment->payment_mode }}</small><br>
                        <b>Mode of Transport:</b> {{ $shipment->mode }}<br>
                    </div>
                </div>

                <!-- table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Type of Shipment</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $shipment->quantity }}</td>
                                    <td>{{ $shipment->type }}</td>
                                    <td>{{ $shipment->product }}</td>
                                    <td>{{ $shipment->description }}</td>
                                    <td>
                                        {{ currency($shipment->currency) }}{{ formatAmount($shipment->amount) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- payment row -->
                <div class="row">
                    <div class="col-xs-6">
                        <p class="lead"><strong>Payment Methods:</strong></p>
                        <img src="{{ asset('assets/invoice/images/securepayment.png') }}" alt="Payment Methods">
                    </div>

                    <div class="col-xs-6">
                        <p class="lead"><strong>Official Stamp / {{ date('l') }}, {{ date('d.M.Y') }}</strong>
                        </p>
                        <img src="{{ asset('assets/invoice/images/stamp.png') }}" alt="Stamp" height="100">
                    </div>
                </div>
            </section>
        </div>

        <script src="{{ asset('assets/invoice/js/app.min.js') }}"></script>
    </body>

</html>
