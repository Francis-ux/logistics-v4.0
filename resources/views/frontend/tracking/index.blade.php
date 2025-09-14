<x-layouts.frontend.master :title="$title">
    <!-- About Start -->
    <section class="about-section-three" id="pbmit-about">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-12 col-xl-12">
                    <x-partials.bootstrap-alert />
                    <div class="contact-form-rightbox pbmit-bg-color-white">
                        <div class="pbmit-heading animation-style2">
                            <h2 class="pbmit-title text-center">Track your Shipment</h2>
                        </div>
                        <p class="text-center">Enter a tracking number, and get tracking results.</p>
                        <form class="contact-form" method="post" action="{{ route('tracking.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text"
                                        class="form-control @error('tracking_number') is-invalid @enderror"
                                        placeholder="Enter Tracking Number" name="tracking_number"
                                        value="{{ old('tracking_number') }}">
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
            </div>
        </div>
    </section>
    <!-- About End -->
</x-layouts.frontend.master>
