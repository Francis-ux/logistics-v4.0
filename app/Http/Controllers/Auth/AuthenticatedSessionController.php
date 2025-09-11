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
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }
}
