<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::latest()->paginate(10);

        return view('master-data.category.index', compact('categories'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('master-data.category.create');
    }

    /**
     * Menyimpan data kategori baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
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
