<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KelasController;

use App\Http\Controllers\StokController;
/* Route::get('/', function () { */
/*     return view('auth.login'); */
/* }); */

Route::get('/', function() {
    return view('include.welcome');
});

Route::middleware(['auth', 'verified', 'rolesChecker:admin'])->group(function() {
    Route::get('/dashboard', function () {
        return view('include.welcome'); })->name('dashboard'); });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resources([
    'mahasiswa' => CRUDController::class,
    'dosen' => DosenController::class,
    'tahunakademik' => TahunAkademikController::class,
    'ruang' => RuangController::class,
    'fakultas' => FakultasController::class,
    'prodi' => ProdiController::class,
    'kelas' => kelasController::class,
]);

Route::resources([
    'stok' => StokController::class,
]);

Route::controller(CustomController::class)->group(function() {
    Route::get('/perkalian', 'perkalian');
    Route::get('/penjumlahan', 'penjumlahan');
    Route::get('/berita/{idBerita}', 'berita');
    Route::post('/kali', 'kali');
    Route::post('/jumlah', 'jumlah');
    Route::get('/inputmhs', 'inputmhs');
    Route::post('/tampildata', 'tampildata');
    Route::get('/inputmatkul', 'inputmatkul');
    Route::post('/tambahmatkul', 'tambahmatkul');
    Route::get('/krs', 'krs');
});


require __DIR__.'/auth.php';
