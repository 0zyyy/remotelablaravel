<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PraktikumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('/login');
// });

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', 'LoginController@login')->name('trylogin');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register/{hak}', 'RegisterController@index',)->name('register');
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');
Route::middleware(['auth'])->group(function () {
    Route::get('/users', 'DashboardController@index')->name('users');
    Route::get('/dashboard/antrian', 'AntrianController@index')->name('antrian');
    Route::get('/dashboard/users', 'DashboardController@users');
    Route::get('/daftarpraktikum', 'DashboardController@allPraktikum');
    Route::post('/dashboard/antrian/tambah', 'AntrianController@tambah');
    Route::post('/dashboard/antrian/{user:id}', 'AntrianController@hapus');
    Route::get('/praktikum/{praktikum:slug}', 'PraktikumController@index')->name('praktikum');
    Route::get('/praktikum/{praktikum:slug}/mulaipraktikum', 'PraktikumController@mulaipraktikum')->name('mulaipramtikum');
    Route::get('/monitoringpraktikum', 'DashboardController@monitoring')->name('monitoring');
    Route::get('/data/laporanpraktikum', 'DashboardController@laporanpraktikum')->name('laporanpraktikum');
    Route::get('/lihatlaporan/{praktikum:slug}', 'DashboardController@lihatlaporan')->name('lihatlaporan');
    Route::get('/data/hasilpraktikum', 'DashboardController@hasilprak')->name('hasilprak');
    Route::get('/data/hasilpraktikum/{praktikum:slug}', 'DashboardController@datahasil');
    Route::get('/data/hasilpraktikum/{praktikum:slug}/{user:id}', 'DashboardController@dataHasilById');
    Route::get('/upload', 'DashboardController@upload');
    Route::post('/upload', 'DashboardController@prosesUpload');
    Route::get('/settings', 'DashboardController@settings');
    Route::post('/settings', 'DashboardController@update');
    Route::post('/kontrolmotor/start', 'PraktikumController@forward')->name('forwardmotor');
    Route::post('/kontrolmotor/reverse', 'PraktikumController@reverse')->name('reversemotor');
    Route::post('/kontrolmotor/stop', 'PraktikumController@stop')->name('stopmotor');
    ROute::post('/lampu/{id}/{status}', 'PraktikumController@lampu')->name('lampu');
});
Route::get('/grafik', 'PraktikumController@grafik')->name('grafik');
Route::get('/nyobagr', function () {
    return view('data.nyobachar', [
        'title' => 'Nyoba Grafik',
    ]);
});
