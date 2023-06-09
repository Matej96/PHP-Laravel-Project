<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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
        if ($request->authenticate()){

            $request->session()->regenerate();

            $user = DB::table('users as u')
                ->select('u.*')
                ->where('u.email', '=', $request->email)
                ->first();

            if($user->role == "admin"){
                return redirect('/admin');
            }

            return redirect()->intended(RouteServiceProvider::HOME);

        }

        return redirect()->back()->withErrors(['email' => 'Nesprávne prihlasovacie údaje.'])->withInput()->with(['show_login' => true]);

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
