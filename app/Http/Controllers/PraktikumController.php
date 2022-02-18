<?php

namespace App\Http\Controllers;

use App\Models\Praktikum;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\VarDumper\Dumper\esc;

class PraktikumController extends Controller
{
    public function index($slug)
    {
        return view('praktikum.index', [
            'title' => 'Praktikum',
            'praktikum' => Praktikum::firstWhere('slug', $slug),
        ]);
    }
    public function mulaipraktikum($slug)
    {
        // dd();
        $id_prak = Praktikum::firstWhere('slug', $slug)->id;
        // RETURN VIEW
        if ($id_prak == 1) {
            return view('praktikum.praktikum1', [
                'title' => Praktikum::firstWhere('slug', $slug)->nama_prak,
                'praktikum' => Praktikum::firstWhere('slug', $slug),
                'frekuensi' => DB::table('knobs')->orderBy('waktu', 'desc')->first(),
            ]);
        } elseif ($id_prak == 2) {
            return view('praktikum.praktikum2', [
                'title' => Praktikum::firstWhere('slug', $slug)->nama_prak,
                'praktikum' => Praktikum::firstWhere('slug', $slug),
                'frekuensi' => DB::table('knobs')->orderBy('waktu', 'desc')->first(),
            ]);
        }
        return view('praktikum.praktikum1', [
            'title' => Praktikum::firstWhere('slug', $slug)->nama_prak,
            'praktikum' => Praktikum::firstWhere('slug', $slug),
            'frekuensi' => DB::table('knobs')->orderBy('waktu', 'desc')->first(),
        ]);
    }
    // public function sendMotor($status)
    // {
    //     if ($status == 'start') {
    //         $send = DB::table('motors')
    //             ->where('id', 1)
    //             ->update(['status_motor_forward' => 1,'status_motor_reverse' => 0]);
    //     } else if ($status == 'stop') {
    //         $send = DB::table('motors')
    //             ->where('id', 1)
    //             ->update(['status_motor_forward' => 0, 'status_motor_reverse' => 0]);
    //     } else {
    //         $send = DB::table('motors')
    //             ->where('id', 1)
    //             ->update(['status_motor_reverse' => 1,'status_motor_forward' => 0]);
    //     }
    //     if($send){
    //         return response()->json(['status' => 'success']);
    //     }
    //     return response()->json(['status' => 'error']);
    // }
    public function forward()
    {
        $sendForward = DB::table('motors')
            ->where('id', 1)
            ->update(['status_motor_forward' => 1]);
        if ($sendForward) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil forward motor']);
        }
        return response()->json(['status' => 'failed','message' => 'Gagal forward motor, ada kesalahan']);
    }
    public function reverse()
    {
        $sendReverse = DB::table('motors')
            ->where('id', 1)
            ->update(['status_motor_reverse' => 1]);
        if ($sendReverse) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil reverse motor']);
        }
        return response()->json(['status' => 'failed','message' => 'Gagal reverse motor, ada kesalahan']);
    }
    public function stop()
    {
        $sendStop = DB::table('motors')
            ->where('id', 1)
            ->update(['status_motor_forward' => 0, 'status_motor_reverse' => 0]);
        if ($sendStop) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil stop motor']);
        }
        return response()->json(['status' => 'failed','message' => 'Ada kesalahan']);
    }
    public function lampu($id, $status)
    {
        $sendLampu = DB::table('lampu')
            ->where('id', $id)
            ->update(['status_lampu' => $status]);
        $status = $status ? 'menyala' : 'mati';
        if ($sendLampu) {
            return response()->json(['status' => 'success', 'message' => 'Lampu ' . $id . ' ' . $status]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Lampu sudah ' . $status]);
    }
    public function knob($hertz)
    {
        $hertzSebelum = DB::table('knobs')->orderBy('waktu', 'desc')->first();
        if ($hertz == $hertzSebelum->hertz) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Silahkan mengganti ke frekuensi yang lain'
            ]);
        }
        $sendHertz = DB::table('knobs')
            ->insert(['hertz' => $hertz, 'waktu' => now()]);
        if ($sendHertz) {
            return response()->json(['status' => 'success', 'message' => 'Frekuensi berhasil diubah']);
        }
        return response()->json(['status' => 'failed', 'message' => 'Frekuensi gagal diubah']);
    }
    //fungsi untuk mengambil data dari database untuk grafik
    public function grafik()
    {
        $data = DB::table('rpm')->select(['Detik', 'Kecepatan_Rotor', 'Frekuensi'])->get();
        if ($data->count() > 0) {
            $obj = array();
            foreach ($data as $d) {
                $element = array($d->Detik, $d->Kecepatan_Rotor, $d->Frekuensi);
                array_push($obj, $element);
            }
            return json_encode($obj);
        } else {

            $obj = array();
            $element = array(0, 0);
            array_push($obj, $element);
            return json_encode($obj);
        }
    }
    public function table()
    {
        $data = DB::table('rpm')->select()->orderBy('Tanggal', 'desc')->limit(5)->get();
        $jml = DB::table('rpm')->select(['jml_lampi'])->count();
        foreach ($data as $d) {
            return "
        <tr>
        <td>" . $d->Frekuensi . "</td>
        <td>" . $jml . "</td>
        <td>" . $d->Kecepatan_Stator . "</td>
        <td>" . $d->Kecepatan_Rotor . "</td>
        <td>" . $d->Arus_Motor . "</td>
        <td>" . $d->Tegangan_Motor . "</td>
        <td>" . $d->V_generator . "</td>
        <td>" . $d->I_generator . "</td>
        </tr>";
        }
    }
}
