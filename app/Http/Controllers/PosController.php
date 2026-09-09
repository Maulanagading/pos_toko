<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        return response('Layar Transaksi Kasir (POS)');
    }

    public function store(Request $request)
    {
        return response('Simpan Transaksi Kasir (POS)');
    }
}
