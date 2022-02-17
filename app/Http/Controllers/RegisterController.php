<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index($hak)
    {
        if($hak == 'dosen'){
            return view('register',[
                'title' => 'Registrasi Dosen',
                'hak' => $hak,
            ]);
        }
        return view('register',[
            'title' => 'Registrasi Mahasiswa',
            'hak' => $hak,
        ]);
    }
    public function tambahDosen(Request $request)
    {   
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'nrp' => 'required|min:6|max:15',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        if($validated){
            $validated['hak'] = 'dosen';
            User::create($validated);
        }
        return redirect('/login')->with('success','Registrasi Berhasil');
    }
    public function tambahMahas(Request $request)
    {   
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'nrp' => 'required|min:6|max:10',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        if($validated){
            $validated['hak'] = 'mahasiswa';
            User::create($validated);
        }
        return redirect('/login')->flash('success','Registrasi Berhasil');
    }
    public function tambah(Request $request, $hak)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'nrp' => 'required|min:6|max:15',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        if($validated){
            $validated['hak'] = $hak;
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);
        }
        return redirect('/login')->with('success','Registrasi Berhasil');
    }
}
