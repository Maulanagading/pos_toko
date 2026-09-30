<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Transaction merepresentasikan data transaksi kasir utama (header transaksi/struk).
 */
class Transaction extends Model
{
    /**
     * Kolom yang dapat diisi secara massal (mass assignment).
     */
    protected $fillable = ['invoice_number', 'user_id', 'total', 'pay', 'change'];

    /**
     * Relasi Many-to-One: Transaksi dicatat dan dilayani oleh satu user (kasir/admin).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi One-to-Many: Satu transaksi berisi rincian beberapa produk (detail transaksi).
     */
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
