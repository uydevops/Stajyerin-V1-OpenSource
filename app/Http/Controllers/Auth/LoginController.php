<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{



    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->withErrors('Email veya şifre hatalı');
        }
    }
}
