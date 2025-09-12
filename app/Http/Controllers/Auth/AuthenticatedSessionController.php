<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        try {
            if (Auth::attempt($credentials, $remember)) {
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard');

                    request()->session()->regenerate();
                }

                if (Auth::user()->role === 'master') {
                    return redirect()->route('master.dashboard');

                    request()->session()->regenerate();
                }
            }

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
