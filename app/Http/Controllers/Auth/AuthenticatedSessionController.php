<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   

    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->with('error', 'Email or password is incorrect');
        }

        $request->session()->regenerate();
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Not Allowed!');
        } elseif ($user->hasRole('vendor')) {
            return redirect()->route('vendor.dashboard')->with('success', 'login successfully!');
        } else {
            return redirect()->route('user.dashboard')->with('success', 'login successfully!');
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
