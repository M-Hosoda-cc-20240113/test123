<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            // 'name' => 'required|string|max:255',
            'sei'       => 'required|string|max:255',
            'sei_kana'  => 'required|string|max:255',
            'mei'       => 'required|string|max:255',
            'mei_kana'  => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'birthday'  => 'required|string|max:255',
            'tel'       => 'required | numeric | digits_between:8,11|unique:users',
            'password'  => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            // 'name' => $request->name,
            'sei'       => $request->sei,
            'sei_kana'  => $request->sei_kana,
            'mei'       => $request->mei,
            'mei_kana'  => $request->mei_kana,
            'tel'       => $request->tel,
            'birthday'  => $request->birthday,
            'email'     => $request->email,
            'email_hash'=> Hash::make($request->email_hash),
            'password'  => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
