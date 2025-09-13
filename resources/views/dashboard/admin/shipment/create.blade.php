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
                        <h4 class="card-title mb-0">Create a New Shipment</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.shipment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- Sender Details --}}
                                <h5 class="col-12 text-primary mt-3">Sender Details</h5>
                                <x-admin.form-input name="sender_name" label="Sender Name" />
                                <x-admin.form-input name="sender_address" label="Sender Address" />
                                <x-admin.form-input name="sender_phone" label="Sender Phone" type="tel" />
                                <x-admin.form-input name="sender_email" label="Sender Email" type="email" />

                                {{-- Client Details --}}
                                <h5 class="col-12 text-primary mt-3">Client Details</h5>
                                <x-admin.form-input name="client_name" label="Client Name" />
                                <x-admin.form-input name="client_address" label="Client Address" />
                                <x-admin.form-input name="client_phone" label="Client Phone" type="tel" />
                                <x-admin.form-input name="client_email" label="Client Email" type="email" />

                                {{-- Shipment Info --}}
                                <h5 class="col-12 text-primary mt-3">Shipment Information</h5>
                                <x-admin.form-select name="shipped_from" label="Shipped From" type="select"
                                    :options="config('setting.nationality')" />
                                <x-admin.form-select name="shipped_to" label="Shipped To" type="select"
                                    :options="config('setting.nationality')" />
                                <x-admin.form-input name="departure_date" label="Departure Date" type="date" />
                                <x-admin.form-input name="arrival_date" label="Arrival Date" type="date" />
                                <x-admin.form-input name="departure_time" label="Departure Time" type="time" />
                                <x-admin.form-input name="arrival_time" label="Arrival Time" type="time" />

                                {{-- Package Dimensions --}}
                                <h5 class="col-12 text-primary mt-3">Package Details</h5>
                                <x-admin.form-input name="weight" label="Weight (kg)" type="number" step="0.01"
                                    min="0" />
                                <x-admin.form-input name="quantity" label="Quantity" type="number" min="1" />
                                <x-admin.form-input name="length" label="Length (cm)" type="number" step="0.01"
                                    min="0" />
                                <x-admin.form-input name="width" label="Width (cm)" type="number" step="0.01"
                                    min="0" />
                                <x-admin.form-input name="height" label="Height (cm)" type="number" step="0.01"
                                    min="0" />

                                {{-- Description & Comment --}}
                                <x-admin.form-input name="description" label="Description" type="textarea" />
                                <x-admin.form-input name="comment" label="Comment" type="textarea" />

                                {{-- Payment & Pricing --}}
                                <h5 class="col-12 text-primary mt-3">Payment & Pricing</h5>
                                <x-admin.form-input name="amount" label="Amount" type="number" step="0.01"
                                    min="0" />
                                <x-admin.form-select name="currency" label="Currency" type="currencies"
                                    :currencies="config('setting.currency')" />
                                <x-admin.form-select name="payment_mode" label="Payment Mode" type="select"
                                    :options="['Cash', 'Cheque', 'BACS', 'Online Banking Transfer']" />

                                {{-- Shipment Type --}}
                                <x-admin.form-select name="type" label="Shipment Type" type="select"
                                    :options="['Air Freight', 'International Shipping', 'Truck Load', 'Van Move']" />
                                <x-admin.form-select name="mode" label="Shipment Mode" type="select"
                                    :options="['Sea Transport', 'Land Shipping', 'Air Freight']" />
                                <x-admin.form-input name="product" label="Product" />
                                <x-admin.form-input name="total_freight" label="Total Freight" type="number"
                                    step="0.01" min="0" />

                                {{-- Carrier Info --}}
                                <h5 class="col-12 text-primary mt-3">Carrier Information</h5>
                                <x-admin.form-input name="carrier_reference_no" label="Carrier Reference No." />
                                <x-admin.form-select name="carrier" label="Carrier" type="select"
                                    :options="['DHL', 'USPS', 'FedEx', config('app.name')]" />

                                {{-- Status & Tracking --}}
                                <h5 class="col-12 text-primary mt-3">Tracking</h5>
                                <x-admin.form-select name="shipment_status" label="Status" type="select"
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
                                    ]" />
                                <x-admin.form-input name="current_location" label="Current Location"
                                    value="{{ old('shipped_from') }}" />

                                {{-- Image Upload --}}
                                <x-admin.form-input name="image" label="Shipment Image" type="file" />

                                {{-- Submit --}}
                                <div class="col-12">
                                    <x-admin.form-button>Create Shipment</x-admin.form-button>
                                </div>
                            </div>
                        </form>

                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
</x-layouts.admin.master>
