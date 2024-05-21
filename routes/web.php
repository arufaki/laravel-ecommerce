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
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\IndexController;



/* Route::get('/', function () { */
/*     return view('auth.login'); */
/* }); */

// ECOMMERCE ROUTE

Route::get('/admin', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('ecomPages.index');
// });
Route::get('/', [IndexController::class, 'index']);
Route::get('/cart', [IndexController::class, 'cart'])->name('ecomPages.cart');
Route::get('/signin', [IndexController::class, 'signin'])->name('ecomPages.signin');
Route::get('/product/{id_stok}', [IndexController::class, 'productDetail'])->name('ecomPages.product-detail');



// END ECOMMERCE ROUTE



Route::middleware(['auth', 'verified', 'rolesChecker:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('include.welcome');
    })->name('dashboard');
});

// Route::middleware(['auth', 'verified', 'rolesChecker:user'])->group(function () {
//     Route::get('/cart', function () {
//         return view('ecomPages.cart');
//     })->name('cart');
// });

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
    'pemasok' => PemasokController::class,
    'pelanggan' => PelangganController::class,
    'jual' => JualController::class,
    'beli' => BeliController::class,
    'satuan' => SatuanController::class,
    'kategori' => KategoriController::class,
    'mutasi' => MutasiController::class,
]);

Route::controller(CustomController::class)->group(function () {
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


require __DIR__ . '/auth.php';
