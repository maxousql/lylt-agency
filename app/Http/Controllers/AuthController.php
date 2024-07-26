<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\LoginRequest;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended(route('homepage'));
        }

        return to_route('auth.login')->withErrors([
            'email' => "L'adresse email ou le mot de passe ne correspondent pas !",
            'password' => "L'adresse email ou le mot de passe ne correspondent pas !"
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function processRegister(CreateUser $request)
    {
        $user = Utilisateur::create($request->validated());

        Auth::loginUsingId($user->id_client);

        return to_route('homepage');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }
}
