<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\HistoriController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginsiswaController;
use App\Http\Controllers\LaporanController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loginsiswa',[LoginsiswaController::class, 'showloginsiswa']);
Route::post('/loginsiswa',[LoginsiswaController::class, 'login']);
Route::get('/siswa',[LoginsiswaController::class, 'index']);
Route::get('/logoutsiswa' , [LoginsiswaController::class, 'logout'])->name('logoutsiswa');

Route::resource('/data-siswa/siswa', SiswaController::class);
Route::resource('/data-kelas/kelas', KelasController::class);
Route::resource('/data-petugas/petugas', PetugasController::class);
Route::resource('/data-spp/spp', SppController::class);
Route::resource('/entri-pembayaran/pembayaran', PembayaranController::class);
Route::resource('/histori-pembayaran/histori', HistoriController::class);
Route::resource('/laporan/index', LaporanController::class);

Route::get('/data-siswa/buatdatasiswa', [SiswaController::class, 'create']);
Route::get('/data-siswa/editdatasiswa', [SiswaController::class, 'edit']);

Route::get('/data-kelas/buatdatakelas', [KelasController::class, 'create']);
Route::get('/data-kelas/editdatakelas', [KelasController::class, 'edit']);

Route::get('/data-petugas/buatdatapetugas', [PetugasController::class, 'create']);
Route::get('/data-petugas/editdatapetugas', [PetugasController::class, 'edit']);

Route::get('/data-spp/buatdataspp', [SppController::class, 'create']);
Route::get('/data-spp/editdataspp', [SppController::class, 'edit']);

Route::get('/entri-pembayaran/bayar', [PembayaranController::class, 'create']);
Route::get('/entri-pembayaran/editpembayaran', [PembayaranController::class, 'edit']);

Route::get('/data-siswa/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/data-kelas/kelas', [KelasController::class, 'index'])->name('kelas');
Route::get('/data-petugas/petugas', [PetugasController::class, 'index'])->name('petugas');
Route::get('/data-spp/spp', [SppController::class, 'index'])->name('spp');
Route::get('/entri-pembayaran/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

Route::get('/pdff', [LaporanController::class, 'exportpdf'])->name('pdff');

