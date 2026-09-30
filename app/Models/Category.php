<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Category merepresentasikan pengelompokan jenis barang (Kategori Produk).
 */
class Category extends Model
{
    /**
     * Kolom yang dapat diisi secara massal (mass assignment).
     */
    protected $fillable = ['name', 'description'];

    /**
     * Relasi One-to-Many: Satu kategori memiliki banyak produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
