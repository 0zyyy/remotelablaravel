<?php

namespace Database\Seeders;

use App\Models\Knob;
use App\Models\User;
use App\Models\Praktikum;
use Database\Factories\MotorFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Knob::factory(20)->create();
        DB::table('motors')->insert([
            'status_motor_forward' => false,
            'status_motor_reverse' => false,
            'waktu' => now()
        ]);
        // $select = DB::table('rpm')
        //             ->select(DB::raw("GROUP_CONCAT(detik SEPARATOR ', '), GROUP_CONCAT(Frekuensi SEPARATOR ', '), GROUP_CONCAT(rpm SEPARATOR ', ')"));
        DB::table('lampu')->insert([
            'Status_Lampu' => false,
            'Keterangan' => 'Lampu 1'
        ]);
        DB::table('lampu')->insert([
            'Status_Lampu' => false,
            'Keterangan' => 'Lampu 2'
        ]);
        DB::table('lampu')->insert([
            'Status_Lampu' => false,
            'Keterangan' => 'Lampu 3'
        ]);
        DB::table('lampu')->insert([
            'Status_Lampu' => false,
            'Keterangan' => 'Lampu 4'
        ]);
        Praktikum::create([
            'nama_prak' => 'Praktikum Mengubah Kecepatan',
            'slug' => 'mengubah-kecepatan',
            'des_prak' => 'Pada praktikum ini, mahasiswa dapat merubah kecepatan Motor Induksi 3 Fasa dengan merubah frekuensi. Mahasiswa akan memvariasikan nilai frekuensi dan mengamati perubahan arus, tegangan, serta menganalisa perbedaan slip antara kecepatan rotor dan medan putar stator',
            'dosen_prak' => 'Dosen Praktikum',
            'langkah_peng' => '1. Masuk pada halaman "Praktikum"
            <br>
            <br>
            2. Klik tombol "Lihat Praktikum" kemudian akan masuk ke halaman mulai praktikum
            <br>
            <br>
            3. Unduh Modul Praktikum  
            <br>
            <br>
            4. Ubah kecepatan motor dengan mengatur frekuensi masukkan melalui knob frekuensi lalu Klik Ganti Frekuensi
            <br>
            <br>
            5. Aktifkan selector pada tombol forward / reverse
            <br>
            <br>
            6. Amati dan catat arus dan tegangan Motor Induksi 3 Fasa serta perbedaan kecepatan rotor dan kecepatan medan putar stator atau slip
            <br>
            <br>
            7. Batas waktu praktikum adalah 30 menit. Pastikan anda klik Selesai sebelum waktu praktikum berakhir
            <br>',
            'status_code' => 0,
            'matkul' => 'Kontrol Gerak dan Penggerak Elektrik'
        ]);
        Praktikum::create([
            'nama_prak' => 'Praktikum Karakteristik Beban',
            'slug' =>'karakter-beban',
            'des_prak' => 'Pada praktikum ini, mahasiswa dapat mengetahui karakteristik Motor Induksi 3 Fasa ketika diberi beban berupa generator yang akan memberi daya pada lampu. Nilai frekuensi akan diatur tetap (fixed) dan jumlah beban akan dirubah. ',
            'dosen_prak' => 'Dosen Praktikum',
            'langkah_peng' => '1. Masuk pada halaman "Praktikum"
            <br>
            <br>
            2. Klik tombol "Lihat Praktikum" kemudian akan masuk ke halaman mulai praktikum
            <br>
            <br>
            3. Baca dan pahami langkah pengerjaan
            <br>
            <br>
            4. Unduh Modul Praktikum
            <br>
            <br>
            5. Klik tombol Mulai Praktikum
            <br>
            <br>
            6. Ubah kecepatan motor dengan mengatur frekuensi masukkan melalui knob frekuensi lalu Klik Ganti Frekuensi. Tetapkan satu nilai frekuensi masukkan
            <br>
            <br>
            7. Tekan tombol Start/Stop untuk menyalakan dan memberhentikan motor
            <br>
            <br>
            8. Variasikan jumlah beban lampu dengan selector switch
            <br>
            <br>
            8. Amati dan catat perubahan arus dan tegangan pada Motor Induksi 3 Fasa dan Generator serta nilai slip Motor Induksi 3 Fasa
            <br>
            <br>
            9. Batas waktu praktikum adalah 30 menit. Pastikan anda klik Selesai sebelum waktu praktikum berakhir
            <br>',
            'status_code' => 0,
            'matkul' => 'Kontrol Gerak dan Penggerak Elektrik'
        ]);
        Praktikum::create([
            'nama_prak' => 'Praktikum Pengaturan Kecepatan (Closed Loop)',
            'slug' => 'pengatur-kecepatan',
            'des_prak' => 'Pada praktikum ini, mahasiswa dapat merubah kecepatan Motor Induksi 3 Fasa dengan merubah frekuensi. Mahasiswa akan memvariasikan nilai frekuensi dan mengamati perubahan arus, tegangan, serta menganalisa perbedaan slip antara kecepatan rotor dan medan putar stator',
            'langkah_peng' => '1. Masuk pada halaman "Praktikum"
            <br>
            <br>
            2. Klik tombol "Lihat Praktikum" kemudian akan masuk ke halaman mulai praktikum
            <br>
            <br>
            3. Unduh Modul Praktikum  
            <br>
            <br>
            4. Ubah kecepatan motor dengan mengatur frekuensi masukkan melalui knob frekuensi lalu Klik Ganti Frekuensi
            <br>
            <br>
            5. Aktifkan selector pada tombol forward / reverse
            <br>
            <br>
            6. Amati dan catat arus dan tegangan Motor Induksi 3 Fasa serta perbedaan kecepatan rotor dan kecepatan medan putar stator atau slip
            <br>
            <br>
            7. Batas waktu praktikum adalah 30 menit. Pastikan anda klik Selesai sebelum waktu praktikum berakhir
            <br>',
            'dosen_prak' => 'Dosen Praktikum',
            'status_code' => 0,
            'matkul' => 'Kontrol Gerak dan Penggerak Elektrik'
        ]);
    }
}
