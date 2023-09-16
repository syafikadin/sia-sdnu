<?php

namespace App\Http\Controllers;

use App\Models\Tapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $data_tapel = Tapel::orderBy('id', 'DESC')->get();
        return view('login.index', [
            'title' => 'Login',
        ], compact('data_tapel'));
    }

    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'tahun_pelajaran' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('loginError', 'Tahun Pelajaran Wajib Diisi');
        } else {
            if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return back()->with('loginError', 'Username / Password Salah!');
            } else {
                session([
                    'tapel_id' => $request->tahun_pelajaran,
                ]);

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
        }

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // if (Auth::attempt($credentials)) {
        //     if (auth()->user()->role == '1') {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/admin');
        //     } elseif (auth()->user()->role == '2') {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/guru');
        //     } elseif (auth()->user()->role == '3') {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/siswa');
        //     }
        //     session([
        //         'tapel_id' => $request->tahun_pelajaran,
        //     ]);
        // }

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
