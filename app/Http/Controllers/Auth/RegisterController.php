<?php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Resident;
use App\Models\Business;
use App\Models\Sme;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Show resident registration form
    public function showResidentRegistrationForm()
    {
        $areas = Area::all();
        return view('auth.register-resident', compact('areas'));
    }

    // Show business registration form
    public function showBusinessRegistrationForm()
    {
        $areas = Area::all();
        return view('auth.register-business', compact('areas'));
    }

    // Handle resident registration
    public function registerResident(Request $request)
    {
        $this->validateResident($request);
        $user = $this->createUser($request);
        if (!$user) {
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }

        event(new Registered($resident = $this->createResident($request, $user->id)));

        return redirect($this->redirectPath())
            ->with('success', 'Resident Registration successful! Please log in with your credentials.');
    }

    // Handle business registration
    public function registerBusiness(Request $request)
    {
//        dd('registerBusiness', $request->all());
        $this->validateBusiness($request);
        $user = $this->createUser($request);
        if (!$user) {
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }

        event(new Registered($business = $this->createBusiness($request, $user->id)));

        return redirect($this->redirectPath())
            ->with('success', 'Business registration successful! Please log in with your credentials.');
    }

    // Validate resident data
    protected function validateResident(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:residents', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'area_id' => ['required', 'exists:areas,id'],
            'address' => ['required', 'string'],
            'age_group' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'interests' => ['nullable', 'string'],
        ]);
    }

    // Validate business data
    protected function validateBusiness(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_name'    => ['required', 'string', 'max:255'],
            'contact_person'  => ['required', 'string', 'max:255'],
            'phone'           => ['required', 'string', 'max:20'],
            'address'         => ['required', 'string'],
            'website'         => ['nullable', 'url'],
            'business_type'   => ['required', 'string'],
            'description'     => ['required', 'string'],
        ]);
    }

    // Create new resident
    protected function createResident(Request $request, $userId)
    {
        return Resident::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => $userId,
            'area_id' => $request->area_id,
            'age_group' => $request->age_group,
            'gender' => $request->gender,
            'interests' => $request->interests,
        ]);
    }

    // Create new business
    protected function createBusiness(Request $request, $userId)
    {
        return Sme::create([
            'user_id'         => $userId,
            'company_name'    => $request->company_name,
            'contact_person'  => $request->contact_person,
            'phone'           => $request->phone,
            'address'         => $request->address,
            'website'         => $request->website,
            'business_type'   => $request->business_type,
            'description'     => $request->description,
        ]);
    }
    // Create new user & return this id
    protected function createUser(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    // Show guest registration form
    public function showGuestRegistrationForm()
    {
        $areas = Area::all();
        return view('auth.register-guest', compact('areas'));
    }
    protected function createGuestUser(Request $request)
    {
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view('auth.login')->with('success', 'Registration successful! Please log in with your credentials.');
    }
}
