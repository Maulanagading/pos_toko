<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller untuk mengelola kategori barang/produk (CRUD Kategori).
 * Hanya dapat diakses oleh Administrator.
 */
class CategoryController extends Controller
{
    /**
     * Menampilkan daftar semua kategori barang.
     */
    public function index()
    {
        return response('Halaman Data Kategori (Admin Only)');
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        //
    }

    /**
     * Menyimpan data kategori baru ke database.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Menampilkan detail kategori tertentu berdasarkan ID.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Memperbarui data kategori di database.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy(string $id)
    {
        //
    }
}
