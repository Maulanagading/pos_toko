<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk membatasi hak akses halaman berdasarkan Role pengguna (e.g. admin, kasir).
 */
class CheckRole
{
    /**
     * Memeriksa apakah pengguna yang sedang login memiliki salah satu role yang diizinkan.
     *
     * @param  Closure(Request): (Response)  $next
     * @param  string  ...$roles  Daftar role yang diizinkan mengakses rute ini
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Jika pengguna belum login ATAU rolenya tidak termasuk dalam daftar yang diizinkan
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            // Tampilkan halaman error 403 (Forbidden / Akses Ditolak)
            return response()->view('errors.403', [
                'message' => 'Anda tidak memiliki akses ke halaman ini.',
            ], 403);
        }

        // Lanjutkan request jika role pengguna sesuai
        return $next($request);
    }
}
