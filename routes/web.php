<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Fitur Autentikasi (Guest & Auth)
|--------------------------------------------------------------------------
| Mengatur alur login dan logout pengguna.
| Middleware 'guest' memastikan user yang sudah login tidak bisa buka form login lagi.
*/

// Menampilkan form login
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Memproses autentikasi (submit email & password)
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

// Mengeluarkan user dari sistem dan menghapus sesi
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Halaman Umum & Dashboard
|--------------------------------------------------------------------------
*/

// Halaman awal aplikasi
Route::get('/', function () {
    return view('welcome');
});

// Halaman informasi singkat tentang sistem POS
Route::get('/about', function () {
    return 'POS Barokah Mart - Sistem Informasi Kasir dan Manajemen Toko Barokah.';
})->name('about');

// Halaman utama setelah user berhasil login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Fitur Khusus Admin (Role: Admin)
|--------------------------------------------------------------------------
| Rute pengelolaan master data yang hanya boleh diakses oleh Administrator.
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    // CRUD Kategori Produk
    Route::resource('categories', CategoryController::class);

    // CRUD Katalog Produk & Stok
    Route::resource('products', ProductController::class);

    // Laporan Rekap Penjualan
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');

    // CRUD Manajemen Pengguna / Kasir
    Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| Fitur Transaksi Kasir (Role: Admin & Kasir)
|--------------------------------------------------------------------------
| Rute operasional kasir untuk memproses penjualan dan riwayat transaksi.
*/
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    // Tampilan layar kasir (Point of Sale)
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');

    // Proses penyimpanan data transaksi penjualan
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');

    // Melihat riwayat transaksi penjualan
    Route::get('/pos/history', function () {
        return response('Halaman Riwayat Transaksi Kasir (POS)');
    })->name('pos.history');
});
