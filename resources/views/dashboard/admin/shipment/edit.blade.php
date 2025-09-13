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
                        <h4 class="card-title mb-0">Edit Shipment: {{ $shipment->tracking_code }}</h4>
                        <x-admin.card-header-button href="{{ route('admin.shipment.create') }}">Create
                            Shipment</x-admin.card-header-button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.shipment.update', $shipment->uuid) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- Sender Details --}}
                                <h5 class="col-12 text-primary mt-3">Sender Details</h5>
                                <x-admin.form-input name="sender_name" label="Sender Name"
                                    value="{{ $shipment->sender_name }}" />
                                <x-admin.form-input name="sender_address" label="Sender Address"
                                    value="{{ $shipment->sender_address }}" />
                                <x-admin.form-input name="sender_phone" label="Sender Phone" type="tel"
                                    value="{{ $shipment->sender_phone }}" />
                                <x-admin.form-input name="sender_email" label="Sender Email" type="email"
                                    value="{{ $shipment->sender_email }}" />

                                {{-- Client Details --}}
                                <h5 class="col-12 text-primary mt-3">Client Details</h5>
                                <x-admin.form-input name="client_name" label="Client Name"
                                    value="{{ $shipment->client_name }}" />
                                <x-admin.form-input name="client_address" label="Client Address"
                                    value="{{ $shipment->client_address }}" />
                                <x-admin.form-input name="client_phone" label="Client Phone" type="tel"
                                    value="{{ $shipment->client_phone }}" />
                                <x-admin.form-input name="client_email" label="Client Email" type="email"
                                    value="{{ $shipment->client_email }}" />

                                {{-- Shipment Info --}}
                                <h5 class="col-12 text-primary mt-3">Shipment Information</h5>
                                <x-admin.form-select name="shipped_from" label="Shipped From" type="select"
                                    :options="config('setting.nationality')" value="{{ $shipment->shipped_from }}" />

                                <x-admin.form-select name="shipped_to" label="Shipped To" type="select"
                                    :options="config('setting.nationality')" value="{{ $shipment->shipped_to }}" />

                                <x-admin.form-input name="departure_date" label="Departure Date" type="date"
                                    :value="$shipment->departure_date->format('Y-m-d')" />
                                <x-admin.form-input name="arrival_date" label="Arrival Date" type="date"
                                    :value="$shipment->arrival_date->format('Y-m-d')" />
                                <x-admin.form-input name="departure_time" label="Departure Time" type="time"
                                    value="{{ $shipment->departure_time }}" />
                                <x-admin.form-input name="arrival_time" label="Arrival Time" type="time"
                                    value="{{ $shipment->arrival_time }}" />

                                {{-- Package Dimensions --}}
                                <h5 class="col-12 text-primary mt-3">Package Details</h5>
                                <x-admin.form-input name="weight" label="Weight (kg)" type="number" step="0.01"
                                    min="0" value="{{ $shipment->weight }}" />
                                <x-admin.form-input name="quantity" label="Quantity" type="number" min="1"
                                    value="{{ $shipment->quantity }}" />
                                <x-admin.form-input name="length" label="Length (cm)" type="number" step="0.01"
                                    min="0" value="{{ $shipment->length }}" />
                                <x-admin.form-input name="width" label="Width (cm)" type="number" step="0.01"
                                    min="0" value="{{ $shipment->width }}" />
                                <x-admin.form-input name="height" label="Height (cm)" type="number" step="0.01"
                                    min="0" value="{{ $shipment->height }}" />

                                {{-- Description & Comment --}}
                                <x-admin.form-input name="description" label="Description" type="textarea"
                                    value="{{ $shipment->description }}" />
                                <x-admin.form-input name="comment" label="Comment" type="textarea"
                                    value="{{ $shipment->comment }}" />

                                {{-- Payment & Pricing --}}
                                <h5 class="col-12 text-primary mt-3">Payment & Pricing</h5>
                                <x-admin.form-input name="amount" label="Amount" type="number" step="0.01"
                                    min="0" value="{{ $shipment->amount }}" />

                                <x-admin.form-select name="currency" label="Currency" type="currencies"
                                    :currencies="config('setting.currency')" value="{{ $shipment->currency }}" />

                                <x-admin.form-select name="payment_mode" label="Payment Mode" type="select"
                                    :options="['Cash', 'Cheque', 'BACS', 'Online Banking Transfer']" value="{{ $shipment->payment_mode }}" />

                                {{-- Shipment Type --}}
                                <x-admin.form-select name="type" label="Shipment Type" type="select"
                                    :options="['Air Freight', 'International Shipping', 'Truck Load', 'Van Move']" value="{{ $shipment->type }}" />

                                <x-admin.form-select name="mode" label="Shipment Mode" type="select"
                                    :options="['Sea Transport', 'Land Shipping', 'Air Freight']" value="{{ $shipment->mode }}" />

                                <x-admin.form-input name="product" label="Product"
                                    value="{{ $shipment->product }}" />
                                <x-admin.form-input name="total_freight" label="Total Freight" type="number"
                                    step="0.01" min="0" value="{{ $shipment->total_freight }}" />

                                {{-- Carrier Info --}}
                                <h5 class="col-12 text-primary mt-3">Carrier Information</h5>
                                <x-admin.form-input name="carrier_reference_no" label="Carrier Reference No."
                                    value="{{ $shipment->carrier_reference_no }}" />
                                <x-admin.form-select name="carrier" label="Carrier" type="select" :options="['DHL', 'USPS', 'FedEx', config('app.name')]"
                                    value="{{ $shipment->carrier }}" />

                                {{-- Image Upload --}}
                                <x-admin.form-input name="image" label="Shipment Image" type="file" />

                                {{-- Submit --}}
                                <div class="col-12">
                                    <x-admin.form-button>Update Shipment</x-admin.form-button>
                                </div>
                            </div>
                        </form>

                    </div><!-- end card-body -->
                    <div class="card-footer">
                        <x-admin.shipment-action-btn :shipment="$shipment" />
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
</x-layouts.admin.master>
