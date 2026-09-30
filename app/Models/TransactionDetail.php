<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model TransactionDetail merepresentasikan baris rincian item barang pada setiap transaksi.
 */
class TransactionDetail extends Model
{
    /**
     * Kolom yang dapat diisi secara massal (mass assignment).
     */
    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'price',
        'subtotal',
    ];

    /**
     * Relasi Many-to-One: Setiap baris rincian merujuk pada satu transaksi induk.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * Relasi Many-to-One: Setiap baris rincian merujuk pada satu produk yang dibeli.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
