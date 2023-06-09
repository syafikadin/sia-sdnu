<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == '1') {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            } elseif (auth()->user()->role == '2') {
                $request->session()->regenerate();
                return redirect()->intended('/guru');
            } elseif (auth()->user()->role == '3') {
                $request->session()->regenerate();
                return redirect()->intended('/siswa');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect("/");
    }
}
