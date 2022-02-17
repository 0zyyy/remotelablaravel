<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login',[
            'title' => 'Login',
        ]);
    }
    public function login(Request $request)
    {
        $user = $request->validate([
            'nrp' => 'required|max:15',
            'password' => 'required|max:12',
        ]);
        if(Auth::attempt($user)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        };
        return back()->with('error','NRP atau Password Salah');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
