<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::guard('customer')->attempt($fields)){
            return redirect()->back()->with('error', 'Email/Password salah');
        }

        toast('Selamat Datang, '.auth('customer')->user()->name, 'success');
        return redirect('/');
    }

    public function logout()
    {
        auth('customer')->logout();

        toast('Berhasil logout', 'success');
        return redirect('/');
    }
}
