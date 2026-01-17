<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirect based on user role
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended(route('admin.dashboard'));
            } elseif (Auth::user()->hasRole('business_owner')) {
                return redirect()->intended(route('business.dashboard'));
            }

            // Default redirect for other users
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }
}
