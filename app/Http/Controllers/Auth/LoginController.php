<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Controller untuk menangani fitur autentikasi (Login dan Logout).
 */
class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login ke pengguna.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Memproses data login yang dikirim oleh pengguna.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input: email harus berformat email valid dan password wajib diisi
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba autentikasi pengguna; jika gagal, kembalikan dengan pesan error
        if (! Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        // 3. Regenerasi session ID untuk mencegah serangan Session Fixation
        $request->session()->regenerate();

        // 4. Arahkan pengguna ke halaman yang sebelumnya dituju atau ke dashboard
        return redirect()->intended(route('dashboard'));
    }

    /**
     * Mengeluarkan pengguna (logout) dan membersihkan sesi aktif.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 1. Hapus status autentikasi user
        Auth::logout();

        // 2. Hapus seluruh data sesi dan regenerate token CSRF untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 3. Arahkan kembali ke halaman login
        return redirect('/login');
    }
}
