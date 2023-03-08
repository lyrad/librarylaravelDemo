<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class SecurityController extends BaseController
{
    /**
     * Display the login form to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {

    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenficate(Request $request)
    {
        // Si l'utilisateur est déjà authentifié, on le redirige vers la page par défaut.
        if(Auth::check() === true) {
            redirect('library.index');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials) === true) {
            // On régénère le session id pour éviter les fixations de session.
            $request->session()->regenerate();

            return redirect()->intended('library.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
