<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'ussername' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'name' => $request->ussername,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('succes', 'kamu berhasil logout');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'ussername' => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6'
        ]);

        $data['name'] = $request->ussername;
        $data['email'] = $request->email;
        $data['password'] = $request->password;

        User::create($data);

        $data = [
            'name' => $request->ussername,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }
}
