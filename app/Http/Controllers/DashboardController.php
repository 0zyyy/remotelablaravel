<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Praktikum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // dd(Auth::user()->email_verified_at);
        if (Auth::user()->email_verified_at == null) {
            Auth::logout();
            $request->session()->invalidate();
            return redirect('/login')->with('error', 'Monggo Silahkan Verifikasi email telebih dahulu');
        }
        return view('dashboard', [
            'title' => 'Dashboard',
            'praktikums' => Praktikum::all(),
        ]);
    }
    public function users()
    {
        $userLogged = Auth::user();
        if ($userLogged->hak == 'admin') {
            return view('users', [
                'title' => 'Pengguna',
                'users' => User::all()->where('hak', '==', 'mahasiswa'),
            ]);
        }
        return view('error', [
            'title' => 'Error',
            'message' => 'Anda tidak memiliki hak untuk mengakses halaman ini',
        ]);
    }
    public function settings()
    {
        return view('settings', [
            'title' => 'Pengaturan',
        ]);
    }
    public function antrian()
    {
        return view('antrian', [
            'title' => 'Antrian',
            'antrian' => Antrian::all(),
        ]);
    }

    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/settings')->with('success', 'Berhasil mengubah data');
    }
    public function monitoring()
    {
        return view('monitor.monitorprak',[
            'title' => 'Monitoring Praktikum',
        ]);
    }
    public function laporanpraktikum()
    {
        return view('data.laporanpraktikum',[
            'title' => 'Laporan Praktikum',
            'praktikum' => Praktikum::all(),
        ]);
    }
    public function lihatlaporan($slug)
    {
        $praktikum = Praktikum::where('slug', $slug)->first();
        return view('data.lihatlaporan',[
            'title' => 'Lihat Laporan Praktikum',
            'praktikum' => $praktikum,
            'users' => User::where('hak','mahasiswa')->get(),
        ]);
    }
    public function hasilprak()
    {
        return view('data.hasilprak',[
            'title' => 'Hasil Praktikum',
            'praktikum' => Praktikum::all()
        ]);
    }
    public function datahasil($slug)
    {
        return view('data.datahasil',[
            'title' => 'Data Hasil Praktikum',
            'praktikum' => Praktikum::where('slug', $slug)->first(),
            'users' => User::where('hak','mahasiswa')->get(),
        ]);
    }
    public function dataHasilById($slug,$id)
    {
        return view('data.hasilbyid',[
            'title' => 'Data Hasil Praktikum',
            'praktikum' => Praktikum::where('slug', $slug)->first(),
            'user' => User::where('id', $id)->first(),
            'hasilprak' => DB::table('hasil_praks')->select('hasil_praks.*')->where('user_id', $id)->get(),
        ]);
    }
    public function upload()
    {
        return view('data.upload',[
            'title' => 'Upload Laporan Praktikum',
            'nama' => Auth::user()->name,
            'nrp' => Auth::user()->nrp
        ]);
    }
    public function prosesUpload(Request $request)
    {
        $req = $request->validate([
            'berkas' => 'required|file|mimes:pdf|max:2048',
        ]);
        $file = $request->file('file');
        dd($file);
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
    }
}
