<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login.index')->with('success', 'Akun berhasil didaftarkan.');
    }
}
