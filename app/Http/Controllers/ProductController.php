<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Controller untuk mengelola data Produk & Stok Toko (CRUD Produk).
 * Hanya dapat diakses oleh Administrator.
 */
class ProductController extends Controller
{
    /**
     * Menampilkan daftar seluruh produk dan status stoknya.
     */
    public function index()
    {
        return response('Halaman Data Produk (Admin Only)');
    }

    /**
     * Menampilkan form untuk menambahkan produk baru.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('master-data.product.create', compact('categories'));
    }

    /**
     * Menyimpan data produk baru ke dalam database.
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail spesifik suatu produk berdasarkan ID.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan form edit untuk memperbarui data produk.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Memperbarui data produk yang ada di database.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Menghapus data produk dari database.
     */
    public function destroy(string $id)
    {
        //
    }
}
