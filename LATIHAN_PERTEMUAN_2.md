# Laporan & Jawaban Latihan Pertemuan 2
**Mata Kuliah:** Praktikum Pemrograman Web Framework  
**Materi:** Arsitektur Laravel, Struktur Folder, dan Routing  
**Aplikasi:** POS Barokah Mart  

---

## 1. Peta Rute Tambahan (Pengelolaan Data Supplier)

Berikut adalah rancangan tabel peta rute untuk modul pengelolaan data supplier (mengikuti standar RESTful Resource Controller di Laravel):

| Rute / URI | HTTP Method | Nama Aksi Controller | Nama Rute (`name`) | Deskripsi Fungsi | Hak Akses |
| :--- | :--- | :--- | :--- | :--- | :--- |
| `/suppliers` | `GET` | `SupplierController@index` | `suppliers.index` | Menampilkan daftar seluruh supplier pemasok barang | Admin |
| `/suppliers/create` | `GET` | `SupplierController@create` | `suppliers.create` | Menampilkan form tambah supplier baru | Admin |
| `/suppliers` | `POST` | `SupplierController@store` | `suppliers.store` | Menyimpan data supplier baru ke database | Admin |
| `/suppliers/{id}` | `GET` | `SupplierController@show` | `suppliers.show` | Menampilkan detail informasi satu supplier tertentu | Admin |
| `/suppliers/{id}/edit` | `GET` | `SupplierController@edit` | `suppliers.edit` | Menampilkan form edit data supplier | Admin |
| `/suppliers/{id}` | `PUT`/`PATCH`| `SupplierController@update` | `suppliers.update` | Memperbarui data supplier yang ada di database | Admin |
| `/suppliers/{id}` | `DELETE` | `SupplierController@destroy` | `suppliers.destroy` | Menghapus data supplier dari database | Admin |

> Di Laravel, seluruh rute di atas dapat didaftarkan secara ringkas menggunakan:
> ```php
> Route::middleware(['auth', 'role:admin'])->group(function () {
>     Route::resource('suppliers', SupplierController::class);
> });
> ```

---

## 2. Rute `/about` Menggunakan Closure

Rute `/about` telah ditambahkan langsung di file `routes/web.php` tanpa menggunakan controller:

```php
Route::get('/about', function () {
    return 'POS Barokah Mart - Sistem Informasi Kasir dan Manajemen Toko Barokah.';
})->name('about');
```

---

## 3. Perbedaan `Route::get()` dan `Route::post()` Beserta Contoh Kasus di Aplikasi POS

### A. Perbedaan Utama

| Pembeda | `Route::get()` | `Route::post()` |
| :--- | :--- | :--- |
| **Tujuan HTTP** | Mengambil/meminta (*retrieve*) data dari server tanpa mengubah state data di database (bersifat *idempotent* & aman). | Mengirimkan data ke server untuk diproses, menambah, atau mengubah state data (*non-idempotent*). |
| **Pengiriman Data** | Parameter dikirimkan melalui URL query string (tampak di address bar browser, e.g. `?page=2`). | Data dikirimkan melalui *request payload / HTTP body* (tidak tampak di URL). |
| **Keamanan** | Tidak cocok untuk data sensitif karena terekam di URL history, log server, dan bookmark. | Lebih aman untuk data sensitif serta wajib dilindungi CSRF protection (`@csrf`) di Laravel. |
| **Kapasitas Data** | Terbatas oleh panjang maksimum URL browser (biasanya ~2048 karakter). | Menampung data yang jauh lebih besar (teks panjang, array data transaksi, upload berkas). |

### B. Contoh Kasus Pemakaian di Aplikasi POS Barokah Mart

1. **Kasus `Route::get()`:**
   - **Melihat Daftar Produk & Halaman Transaksi Kasir (`/pos`):** Kasir membuka halaman untuk melihat katalog barang yang tersedia. Operasi ini hanya membaca data produk dan stok tanpa melakukan mutasi pada database.
   - **Melihat Laporan Penjualan (`/reports/sales`):** Admin membuka halaman laporan penjualan untuk rentang tanggal tertentu.

2. **Kasus `Route::post()`:**
   - **Proses Autentikasi / Login (`/login`):** Mengirimkan data kredensial (`email` dan `password`) secara aman di dalam body request untuk diverifikasi.
   - **Checkout Transaksi Penjualan Kasir (`/pos`):** Ketika kasir mengklik tombol *"Selesaikan Transaksi"*, kasir mengirimkan data keranjang belanja (daftar ID produk, jumlah beli/qty, subtotal, nominal pembayaran uang tunai). Sistem akan memproses pengurangan stok produk dan menyimpan riwayat transaksi baru ke database.
