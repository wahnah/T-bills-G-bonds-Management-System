<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|alpha_dash|between:3,255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:filter|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nrc' => ['required', 'string', 'regex:/^\d{6}\/\d{2}\/\d{1}$/'],
            'csd' => ['required', 'string', 'regex:/^\d{10}$/'],
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nrc' => $request->nrc,
            'csd' => $request->csd,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
