<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Product merepresentasikan data barang/produk yang dijual di toko.
 */
class Product extends Model
{
    /**
     * Kolom yang dapat diisi secara massal (mass assignment).
     */
    protected $fillable = ['category_id', 'code', 'name', 'unit', 'price', 'stock', 'image'];

    /**
     * Relasi Many-to-One: Setiap produk dimiliki oleh satu kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi One-to-Many: Satu produk bisa terdapat di banyak transaksi detail.
     */
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * Accessor untuk mendapatkan format harga dalam mata uang Rupiah (contoh: "Rp 15.000").
     */
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Rp '.number_format($this->price, 0, ',', '.')
        );
    }
}
