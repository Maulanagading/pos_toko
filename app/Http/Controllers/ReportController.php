<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function sales()
    {
        return response('Halaman Laporan Penjualan (Admin Only)');
    }
}
