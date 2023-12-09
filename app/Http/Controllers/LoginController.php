<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Auth::guard()->attempt($credentials);
        return response()->json(['message' => 'Logged in successfully'], 201);
    }

    public function token()
    {
        return response()->json(['csrf_token' => csrf_token()]);
    }
}
