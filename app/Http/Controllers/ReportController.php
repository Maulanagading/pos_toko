<?php

namespace App\Http\Controllers;

/**
 * Controller untuk laporan dan analitik penjualan toko.
 * Hanya dapat diakses oleh Administrator.
 */
class ReportController extends Controller
{
    /**
     * Menampilkan laporan rekapitulasi data penjualan toko.
     */
    public function sales()
    {
        return response('Halaman Laporan Penjualan (Admin Only)');
    }
}
