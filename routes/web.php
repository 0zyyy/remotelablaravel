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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', 'LoginController@login')->name('trylogin');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/users', 'DashboardController@index')->name('users');
    Route::get('/antrian', 'DashboardController@index')->name('antrian');
    Route::get('/praktikum/{praktikum:slug}', 'PraktikumController@index')->name('praktikum');
    Route::get('/praktikum/{praktikum:slug}/mulaipraktikum', 'PraktikumController@mulaipraktikum')->name('mulaipramtikum');
    Route::get('/monitoringpraktikum', 'DashboardController@monitoring')->name('monitoring');
    Route::get('/data/laporanpraktikum','DashboardController@laporanpraktikum')->name('laporanpraktikum');
    Route::get('/lihatlaporan/{praktikum:slug}','DashboardController@lihatlaporan')->name('lihatlaporan');
    Route::match(['get','post'],'/upload','DashboardController@upload')->name('upload');
    Route::match(['get', 'post'], '/settings', 'DashboardController@settings')->name('settings');
});
Route::get('/grafik','PraktikumController@grafik')->name('grafik');
Route::get('/nyobagr',function(){
    return view('data.nyobachar',[
        'title' => 'Nyoba Grafik',
    ]);
});

