<x-layouts.auth.master :title="$title">
    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    <x-layouts.auth.header />

                    <h3 class="fw-semibold mb-2">Login your account</h3>

                    <p class="text-muted mb-4">Enter your email address, along with your password, to
                        securely access your account.</p>

                    <form method="POST" action="{{ route('login') }}" class="text-start mb-3">
                        @csrf
                        <x-auth.form-input name="email" label="Email" placeholder="Enter your email"
                            value="{{ old('email') }}" formText="We'll never share your email with anyone else." />

                        <x-auth.form-input name="password" label="Password" type="password"
                            placeholder="Enter your password" />

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me">
                                <label class="form-check-label" for="remember_me" name="remember">Remember me</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <x-auth.form-button>Login</x-auth.form-button>
                        </div>
                    </form>
                    <x-layouts.auth.footer />
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth.master>
