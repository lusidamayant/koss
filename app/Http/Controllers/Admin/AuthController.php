<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function authLogin(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::guard('admin')->attempt($fields, $request->remember_me)){
            return redirect()->back()->with('error', "Credential doesn't match with our records");
        }

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
