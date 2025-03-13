<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        // Attempt to authenticate against the users table
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->filled('remember'))) {
            // Authentication passed
            return redirect()->intended(route('products.index'));
        }

        // Authentication failed
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
        /*
        if (Auth::guard('resident')->check()) {
            Auth::guard('resident')->logout();
        } elseif (Auth::guard('business')->check()) {
            Auth::guard('business')->logout();
        } else {
            Auth::logout();
        }
        */
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
