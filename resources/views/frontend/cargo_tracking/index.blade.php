<x-layouts.frontend.master :title="$title">
    {{-- <form action="{{ route('cargo.tracking.store') }}" method="post">
        @csrf
        <div class="tracking_search_inner">
            <x-partials.bootstrap-alert />
            <x-partials.validation-message />
            <h2 class="single_title">Track your Shipment</h2>
            <h5>Enter a tracking number, and get tracking results.</h5>
            <div class="input-group">
                <input type="text" name="tracking_number" class="form-control" placeholder="Tracking Number">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-circle-o-notch"
                            aria-hidden="true"></i>
                        Track</button>
                </span>
            </div>
        </div>
    </form> --}}

    <div class="col-md-12 col-xl-6 offset-lg-3 mt-5 mb-5">
        <x-partials.bootstrap-alert />
        {{-- <x-partials.validation-message /> --}}
        <div class="contact-form-rightbox pbmit-bg-color-white">
            <div class="pbmit-heading animation-style2">
                <h2 class="pbmit-title text-center">Track your Shipment</h2>
            </div>
            <p class="text-center">Enter a tracking number, and get tracking results.</p>
            <form class="contact-form" method="post" action="{{ route('cargo.tracking.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control @error('tracking_number') is-invalid @enderror"
                            placeholder="Enter Tracking Number" name="tracking_number">
                        @error('tracking_number')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="pbmit-btn submit my-4">
                        <span class="pbmit-button-content-wrapper">
                            <span class="pbmit-button-text">Track</span>
                        </span>

                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.frontend.master>
