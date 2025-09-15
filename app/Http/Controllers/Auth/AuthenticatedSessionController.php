<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enum\AdminIsActiveStatus;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Requests\AuthenticatedSessionControllerStoreRequest;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login', ['title' => 'Login your account']);
    }

    public function store(AuthenticatedSessionControllerStoreRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Build a unique key for this user + IP combo
        $key = Str::lower($request->input('email')) . '|' . $request->ip();

        // Check for too many attempts
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()
                ->withErrors(['email' => "Too many login attempts. Please try again in {$seconds} seconds."])
                ->onlyInput('email');
        }

        try {
            if (Auth::attempt($credentials, $remember)) {
                // Successful login → Clear attempts
                RateLimiter::clear($key);

                if (Auth::user()->role === 'admin') {
                    if (Auth::user()->is_active === AdminIsActiveStatus::INACTIVE) {
                        Auth::logout();
                        return back()->withErrors([
                            'email' => 'Your account is currently inactive and cannot be used to log in. Please contact an administrator to reactivate your account.',
                        ])->onlyInput('email');
                    }

                    request()->session()->regenerate();

                    return redirect()->route('admin.dashboard')->with('success', 'Login successful');
                }

                if (Auth::user()->role === 'master') {
                    request()->session()->regenerate();

                    return redirect()->route('master.dashboard')->with('success', 'Login successful');
                }
            }

            // Failed login → Record attempt and throttle for 60 seconds
            RateLimiter::hit($key, 60);

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }

    public function destroy(Request $request)
    {
        // 1️⃣ Logs out the authenticated user
        Auth::logout();

        // 2️⃣ Invalidates the current session to prevent reuse (e.g., session fixation attacks)
        $request->session()->invalidate();

        // 3️⃣ Regenerates the CSRF token to avoid token reuse
        $request->session()->regenerateToken();

        // 4️⃣ Redirects the user to the login page
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
