<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Controller untuk mengelola akun pengguna sistem (Admin & Kasir).
 * Hanya dapat diakses oleh Administrator.
 */
class UserController extends Controller
{
    /**
     * Menampilkan daftar semua pengguna / kasir toko.
     */
    public function index()
    {
        return response('Halaman Kelola Kasir / Pengguna (Admin Only)');
    }

    /**
     * Menampilkan form pendaftaran user/kasir baru.
     */
    public function create()
    {
        //
    }

    /**
     * Menyimpan akun pengguna baru ke database.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Menampilkan informasi profil spesifik seorang pengguna.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit profil/role pengguna.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Memperbarui data akun pengguna di database.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Menghapus akun pengguna dari database.
     */
    public function destroy(string $id)
    {
        //
    }
}
