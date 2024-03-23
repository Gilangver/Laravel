<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.login", [
            'title' => 'loginuser',
        ]);
    }
    public function daftar()
    {
        return view("login.daftar", [
            'title' => 'daftar',
        ]);
    }
    public function validasilogin(Request $request)
    {
        $request->validate([
            'telp' => 'required',
            'password' => 'required'
        ], [
            'telp.required' => 'Nomor telepon wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'telp' => $request->telp,
            'password' => $request->password,
        ];
        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == '1') {
                return redirect('/dashboardpelanggan');
            } elseif (Auth::user()->role == '2') {
                return redirect('/dashboardadmin');
            } elseif (Auth::user()->role == '3') {
                return redirect('/dashboardpemilik');
            }
        } else {
            return redirect('login')->withErrors('Username atau Password Salah')->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
