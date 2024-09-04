<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
       $request->validate([
        'email' => 'required|email',
        'password' => 'required',
       ]);

       if (Auth::attempt(['email' => $request->email, 'password' => $request->passwoord])){
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->route('index');
        } else if ($user->role == 'penulis') {
            return redirect()->route('Admin.berita.berita');
        }
       }

       return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
       ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(('/'));
    }
}
