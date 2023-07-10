<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DataUMController;
use App\Http\Controllers\SuratSurveiController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\LaporanController;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/user', UserController::class);

Route::resource('/anggota', AnggotaController::class);

Route::resource('/data_um', DataUMController::class);

Route::resource('/jenis_data', JenisDataController::class);

Route::resource('/surat_survei', SuratSurveiController::class);

Route::resource('/surat_keluar', SuratKeluarController::class);

Route::get('/laporan/data', [LaporanController::class, 'data']);
Route::get('/laporan/data/pdf', [LaporanController::class, 'dataPdf']);
