<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        return view('antrian',[
            'title' => 'Antrian',
            'antrian' => Antrian::all(),
        ]);
    }
    public function tambah(Request $request)
    {
        $antrian = new Antrian;
        $antrian->id_user = auth()->user()->id;
        $antrian->id_praktikum = 2;
        $antrian->nomor_antrian = Antrian::all()->where('id_praktikum','==',$antrian->id_praktikum)->count()+1;
        $antrian->save();
        return redirect('/dashboard/antrian')->with('success','Berhasil menambahkan antrian');
    }
    public function hapus(User $user)
    {
        $antrian = Antrian::where('id_user','=',$user->id);
        $antrian->delete();
        return redirect('/dashboard/antrian')->with('success','Berhasil menghapus antrian');
    }
}
