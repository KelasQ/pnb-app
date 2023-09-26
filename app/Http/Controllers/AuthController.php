<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email'  =>  'required',
            'password'  =>  'required|min:5'
        ]);

        if (Auth::attempt($attributes)) {
            return redirect(RouteServiceProvider::HOME)->with('success', 'Login Berhasil.');
        }

        throw ValidationException::withMessages([
            'email'   =>  'Maaf, Email Yang Masukan Tidak Ditemukan!',
            'password'   =>  'Maaf, Password Yang Masukan Tidak Ditemukan!'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
