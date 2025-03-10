<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Resident;
use App\Models\Business;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:resident')->except('logout');
        $this->middleware('guest:business')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Check if user exists in residents table
        $resident = Resident::where('email', $request->email)->first();
        if ($resident) {
            if (Auth::guard('resident')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->filled('remember'))) {
                return redirect()->intended(route('resident.dashboard'));
            }
        }

        // Check if user exists in businesses table
        $business = Business::where('email', $request->email)->first();
        if ($business) {
            if (Auth::guard('business')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->filled('remember'))) {
                return redirect()->intended(route('business.dashboard'));
            }
        }

        // If the login attempt was unsuccessful
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function username()
    {
        return 'email';
    }

    public function logout(Request $request)
    {
        if (Auth::guard('resident')->check()) {
            Auth::guard('resident')->logout();
        } elseif (Auth::guard('business')->check()) {
            Auth::guard('business')->logout();
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
