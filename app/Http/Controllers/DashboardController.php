<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Controller untuk menampilkan halaman Dashboard utama.
 */
class DashboardController extends Controller
{
    /**
     * Menampilkan view dashboard setelah user berhasil diautentikasi.
     */
    public function index(): View
    {
        return view('dashboard');
    }
}
