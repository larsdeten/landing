<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return Redirect::route('admin');
        }

        return Redirect::route('index');
    }

    public function loginpage(){
        return view('user.login');
    }

    public function logout(LogoutRequest $request)
    {
        Auth::logout();
        return response()->redirectTo('/');
    }
}
