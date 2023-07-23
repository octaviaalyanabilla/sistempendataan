<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DataUMController;
use App\Http\Controllers\SuratSurveiController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\LoginController;
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
    return redirect('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/user', UserController::class);
// Route::get('/user/logout', [UserController::class, 'logout'])->name('logout.user');

Route::resource('/anggota', AnggotaController::class);

Route::resource('/data_um', DataUMController::class);

Route::resource('/surat_survei', SuratSurveiController::class);

Route::resource('/surat_keluar', SuratKeluarController::class);

Route::get('/laporan/data', [LaporanController::class, 'data']);
Route::get('/laporan/data/pdf', [LaporanController::class, 'dataPdf']);
Route::get('/laporan/dataum', [LaporanController::class, 'dataPdfUM']);
Route::get('/laporan/datasurvei', [LaporanController::class, 'dataPdfSurvei']);
Route::get('/laporan/datakeluar', [LaporanController::class, 'dataPdfKeluar']);

Route::get('/rekap/data', [RekapController::class, 'data']);

Route::get('/surat_survei/detail/{id}', [SuratSurveiController::class, 'detail'])->name('surat_survei.detail');
Route::get('/surat_keluar/detail/{id}', [SuratKeluarController::class, 'detail'])->name('surat_keluar.detail');

Route::post('/surat_survei/disposisi_action', [SuratSurveiController::class, 'disposisi']);
Route::post('/surat_keluar/disposisi', [SuratKeluarController::class, 'disposisi'])->name('surat_keluar.disposisi');

Route::get('/data_um/validasi/{id}', [DataUMController::class, 'validasi'])->name('data_um.validasi');