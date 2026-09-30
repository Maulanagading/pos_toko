<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller untuk menangani operasional Kasir / Point of Sale (POS).
 */
class PosController extends Controller
{
    /**
     * Menampilkan layar utama transaksi kasir (katalog produk & keranjang belanja).
     */
    public function index()
    {
        return response('Layar Transaksi Kasir (POS)');
    }

    /**
     * Memproses dan menyimpan transaksi penjualan baru ke database.
     */
    public function store(Request $request)
    {
        return response('Simpan Transaksi Kasir (POS)');
    }
}
