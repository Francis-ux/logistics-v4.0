<x-layouts.admin.master title="{{ $title }}">
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-admin.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Overview of Package and Delivery Details</h4>
                        <x-admin.card-header-button href="{{ route('admin.shipment.create') }}">Create
                            Shipment</x-admin.card-header-button>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Tracking Code:</dt>
                            <dd class="col-sm-8">{{ $shipment->tracking_code }}</dd>

                            <dt class="col-sm-4">Shipment Type:</dt>
                            <dd class="col-sm-8">{{ ucfirst($shipment->type) }}</dd>

                            <dt class="col-sm-4">Product:</dt>
                            <dd class="col-sm-8">{{ $shipment->product }}</dd>

                            <dt class="col-sm-4">Description:</dt>
                            <dd class="col-sm-8">{{ $shipment->description }}</dd>

                            <dt class="col-sm-4">Status:</dt>
                            <dd class="col-sm-8">
                                <span class="{{ $shipment->status->badge() }}">
                                    {{ $shipment->status->label() }}
                                </span>
                            </dd>

                            <dt class="col-sm-4">Current Location:</dt>
                            <dd class="col-sm-8">
                                {{ $shipment->current_location }}
                                <x-admin.shipment-map :shipment="$shipment" />
                            </dd>

                            <dt class="col-sm-4">Last Update:</dt>
                            <dd class="col-sm-8">{{ formatDateTime($shipment->last_update) }}</dd>

                            <dt class="col-sm-4">Departure:</dt>
                            <dd class="col-sm-8">
                                {{ $shipment->shipped_from }} <br>
                                {{ formatDate($shipment->departure_date) }}
                                {{ formatTime($shipment->departure_time) }}
                            </dd>

                            <dt class="col-sm-4">Destination:</dt>
                            <dd class="col-sm-8">
                                {{ $shipment->shipped_to }} <br>
                                {{ formatDate($shipment->arrival_date) }} {{ formatTime($shipment->arrival_time) }}
                            </dd>

                            <dt class="col-sm-4">Carrier:</dt>
                            <dd class="col-sm-8">{{ $shipment->carrier }} ({{ $shipment->carrier_reference_no }})</dd>

                            {{-- Sender Details --}}
                            <h5 class="col-sm-12 text-primary mt-3">Sender Details</h5>

                            <dt class="col-sm-4">Name:</dt>
                            <dd class="col-sm-8">{{ $shipment->sender_name }}</dd>

                            <dt class="col-sm-4">Address:</dt>
                            <dd class="col-sm-8">{{ $shipment->sender_address }}</dd>

                            <dt class="col-sm-4">Phone:</dt>
                            <dd class="col-sm-8">{{ $shipment->sender_phone }}</dd>

                            <dt class="col-sm-4">Email:</dt>
                            <dd class="col-sm-8">{{ $shipment->sender_email }}</dd>

                            {{-- Client Details --}}
                            <h5 class="col-sm-12 text-primary mt-3">Recipient Details</h5>

                            <dt class="col-sm-4">Name:</dt>
                            <dd class="col-sm-8">{{ $shipment->client_name }}</dd>

                            <dt class="col-sm-4">Address:</dt>
                            <dd class="col-sm-8">{{ $shipment->client_address }}</dd>

                            <dt class="col-sm-4">Phone:</dt>
                            <dd class="col-sm-8">{{ $shipment->client_phone }}</dd>

                            <dt class="col-sm-4">Email:</dt>
                            <dd class="col-sm-8">{{ $shipment->client_email }}</dd>

                            {{-- Package Details --}}
                            <h5 class="col-sm-12 text-primary mt-3">Package Details</h5>

                            <dt class="col-sm-4">Weight:</dt>
                            <dd class="col-sm-8">{{ $shipment->weight }} kg</dd>

                            <dt class="col-sm-4">Quantity:</dt>
                            <dd class="col-sm-8">{{ $shipment->quantity }}</dd>

                            <dt class="col-sm-4">Dimensions (L×W×H):</dt>
                            <dd class="col-sm-8">{{ $shipment->length }} × {{ $shipment->width }} ×
                                {{ $shipment->height }} cm</dd>

                            <dt class="col-sm-4">Comment:</dt>
                            <dd class="col-sm-8">{{ $shipment->comment ?? 'N/A' }}</dd>

                            {{-- Payment Details --}}
                            <h5 class="col-sm-12 text-primary mt-3">Payment Details</h5>

                            <dt class="col-sm-4">Amount:</dt>
                            <dd class="col-sm-8">
                                <strong>{{ currency($shipment->currency) . formatAmount($shipment->amount) }}</strong>
                                {{ currency($shipment->currency, 'code') }}
                            </dd>

                            <dt class="col-sm-4">Payment Mode:</dt>
                            <dd class="col-sm-8">{{ ucfirst($shipment->payment_mode) }}</dd>

                            <dt class="col-sm-4">Total Freight:</dt>
                            <dd class="col-sm-8">{{ $shipment->total_freight }}</dd>

                            @if ($shipment->image)
                                <dt class="col-sm-4">Image:</dt>
                                <dd class="col-sm-8"><img src="{{ asset($shipment->image) }}" class="img-thumbnail">
                                </dd>
                            @endif

                        </dl>
                    </div><!-- end card-body -->
                </div><!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Shipment Locations</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Location</th>
                                        <th>Google Map Location</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shipment->shipmentLocation()->latest()->get() as $index => $shipmentLocation)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if (
                                                    $shipment->current_location == $shipmentLocation->location &&
                                                        $shipment->status->value == $shipmentLocation->status->value)
                                                    Current Location: <span
                                                        class="text-success"><b>{{ $shipmentLocation->location }}</b></span>
                                                @else
                                                    Previous Location: <span
                                                        class="text-danger"><b>{{ $shipmentLocation->location }}</b></span>
                                                @endif
                                            </td>
                                            <td>{{ $shipmentLocation->google_map_location }}</td>
                                            <td>{{ $shipment->description }}</td>
                                            <td>{{ formatDate($shipmentLocation->date) }}
                                            </td>
                                            <td>{{ formatTime($shipmentLocation->time) }}</td>
                                            <td>
                                                <span
                                                    class="{{ $shipmentLocation->status->badge() }}">{{ $shipmentLocation->status->label() }}</span>
                                            </td>
                                            <td>
                                                <x-admin.method-buttons
                                                    action="{{ route('admin.shipment.location.destroy', $shipmentLocation->uuid) }}"
                                                    class="btn btn-danger m-1">Delete</x-admin.method-buttons>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-footer">
                        <x-admin.shipment-action-btn :shipment="$shipment" />
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Update Shipment Locations</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.shipment.location.update', $shipment->uuid) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <x-admin.input-field name="shipment_status" label="Status" type="select"
                                    :options="[
                                        'Picked Up',
                                        'On Hold',
                                        'Out For Delivery',
                                        'In Transit',
                                        'En Route',
                                        'Cancelled',
                                        'Delivered',
                                        'Returned',
                                        'Arrived',
                                    ]" value="{{ $shipment->status }}" />
                                <x-admin.input-field name="location" label="Location"
                                    value="{{ $shipment->current_location }}" />
                                <x-admin.input-field name="google_map_location" label="Google Map Location"
                                    value="{{ $shipment->current_location }}" />
                                <x-admin.input-field name="description" label="Description" type="textarea" />
                                <x-admin.input-field name="date" label="Date" type="date" />
                                <x-admin.input-field name="time" label="Time" type="time" />
                                <x-admin.input-field name="notification" label="Notification" type="select"
                                    :options="['None', 'Email']" />

                                <x-admin.form-submit-button>Update</x-admin.form-submit-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <script>
        document.getElementById('location').addEventListener('input', function() {
            document.getElementById('google_map_location').value = this.value;
        });
    </script>
</x-layouts.admin.master>
