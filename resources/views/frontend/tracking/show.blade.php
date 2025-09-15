<x-layouts.frontend.master :title="$title">
    <style>
        .location-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .location-item {
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 8px;
            border-radius: 4px;
            color: #333;
        }

        .current-location {
            background-color: #28a745;
            color: #fff;
        }

        .previous-location {
            background-color: #6c757d;
            color: #fff;
        }

        .blink {
            animation: blink-animation 1s infinite;
        }

        @keyframes blink-animation {
            50% {
                opacity: 0.5;
            }
        }

        .location-container {
            width: 100%;
            padding: 0 15px;
        }

        .no-location-warning {
            background-color: #fff3cd;
            color: #856404;
            padding: 15px;
            border: 1px solid #ffeeba;
            border-radius: 4px;
            margin-bottom: 8px;
        }

        address {
            margin-bottom: 0;
            font-style: normal;
        }

        .location-text {
            margin: 0;
            padding: 0;
        }

        .location-date,
        .location-status {
            font-size: 0.875rem;
            display: block;
        }
    </style>

    <div class="container">
        <div class="row g-0">
            <div class="col-md-12 col-xl-12 mt-5 mb-5">
                <x-partials.bootstrap-alert />
                <div class="contact-form-rightbox pbmit-bg-color-white">
                    <div class="col-12 mb-5">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <img class="img-fluid w-75" src="/assets/images/stamp.jpeg" alt="" srcset="">
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <h6>Shipping Details</h6>
                                <dl class="row">
                                    <dt class="col-sm-2">From:</dt>
                                    <dd class="col-sm-10">
                                        <address>
                                            <strong>{{ @$shipment->sender_name }} <br></strong>
                                            <small> <span class="text-lead">Address:</span>
                                                {{ @$shipment->sender_address }}</small> <br>
                                            <small> <span class="text-lead">Email:</span>
                                                {{ @$shipment->sender_email }}</small> <br>
                                            <small> <span class="text-lead">Phone:</span>
                                                {{ @$shipment->sender_phone }}</small>
                                        </address>
                                    </dd>
                                    <dt class="col-sm-2">To:</dt>
                                    <dd class="col-sm-10">
                                        <address>
                                            <strong>{{ @$shipment->client_name }} <br></strong>
                                            <small> <span class="text-success">Address:</span>
                                                {{ @$shipment->client_address }}</small> <br>
                                            <small> <span class="text-success">Email:</span>
                                                {{ @$shipment->client_email }}</small> <br>
                                            <small> <span class="text-success">Phone:</span>
                                                {{ @$shipment->client_phone }}</small>
                                        </address>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <dl class="row">
                                    <dt class="col-sm-2 text-lead">Description:</dt>
                                    <dd class="col-sm-10">{{ @$shipment->description }}</dd>
                                    <dt class="col-sm-2 text-lead">Status:</dt>
                                    <dd class="col-sm-10 blink text-success">{{ @$shipment->status->value }}</dd>
                                    <dt class="col-sm-12 text-lead">Shipped from:</dt>
                                    <dd class="col-sm-12">{{ @$shipment->shipped_from }}</dd>
                                    <dt class="col-sm-12 text-lead">Shipped to:</dt>
                                    <dd class="col-sm-12">{{ @$shipment->shipped_to }}</dd>
                                    <dt class="col-sm-12 text-lead">Expected Date of Delivery:</dt>
                                    <dd class="col-sm-12">
                                        {{ formatDate(@$shipment->arrival_date) }} </dd>
                                    <dt class="col-sm-12 text-lead">Pickup Location:</dt>
                                    <dd class="col-sm-12">{{ @$shipment->current_location }}</dd>
                                    <dt class="col-sm-12 text-lead">Date of Shipment:</dt>
                                    <dd class="col-sm-12">
                                        {{ formatDate(@$shipment->departure_date) }} </dd>
                                    <dt class="col-sm-12 text-lead">Shipped by:</dt>
                                    <dd class="col-sm-12">{{ @$shipment->carrier }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-5">
                        <h5>Location History</h5>
                        <ul class="location-list">
                            @if ($shipmentLocations)
                                @foreach ($shipmentLocations as $shipmentLocation)
                                    <div class="location-container">
                                        <li
                                            class="location-item {{ $shipment->status->value == $shipmentLocation->status->value && $shipment->current_location == $shipmentLocation->location ? 'current-location' : 'previous-location' }}">
                                            <address>
                                                <p
                                                    class="location-text {{ $shipment->status->value == $shipmentLocation->status->value && $shipment->current_location == $shipmentLocation->location ? 'blink' : '' }}">
                                                    {{ $shipment->status->value == $shipmentLocation->status->value && $shipment->current_location == $shipmentLocation->location ? "Current location: $shipmentLocation->location" : "Previous location: $shipmentLocation->location" }}
                                                </p>
                                                <small class="location-date">{{ formatDate($shipmentLocation->date) }}
                                                    {{ formatTime($shipmentLocation->time) }}</small>
                                                <small
                                                    class="location-status">{{ $shipmentLocation->status->value }}</small>
                                            </address>
                                        </li>
                                    </div>
                                @endforeach
                            @else
                                <div class="no-location-warning" role="alert">
                                    No location history
                                </div>
                            @endif
                        </ul>
                    </div>

                    <div class="col-12 mb-5">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no"
                                    marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{ ucfirst($shipment->current_location) }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                    href="https://gachanymph.com/">Gacha Nymph</a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    width: 100%;
                                    height: 400px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    width: 100%;
                                    height: 400px;
                                }

                                .gmap_iframe {
                                    width: 100% !important;
                                    height: 400px !important;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.frontend.master>
