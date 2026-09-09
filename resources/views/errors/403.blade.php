<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - Akses Ditolak | POS Barokah Mart</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md text-center border border-gray-100">
        <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <span class="text-xs font-semibold uppercase tracking-wider text-red-500 bg-red-50 px-2.5 py-1 rounded-full">Error 403 - Forbidden</span>
        <h1 class="text-2xl font-bold text-gray-800 mt-3 mb-2">Akses Ditolak</h1>
        <p class="text-gray-600 text-sm mb-6">
            {{ $message ?? ($exception ? $exception->getMessage() : 'Anda tidak memiliki izin/hak akses untuk membuka halaman ini.') }}
        </p>

        @auth
            <div class="p-3 bg-gray-50 rounded-lg text-left text-xs text-gray-600 mb-6 border border-gray-200">
                <div class="flex justify-between py-1 border-b border-gray-200">
                    <span class="text-gray-500">Pengguna:</span>
                    <span class="font-medium text-gray-800">{{ auth()->user()->name }}</span>
                </div>
                <div class="flex justify-between py-1">
                    <span class="text-gray-500">Peran Akun:</span>
                    <span class="font-semibold text-indigo-600 uppercase">{{ auth()->user()->role }}</span>
                </div>
            </div>
        @endauth

        <div class="flex flex-col gap-2">
            @auth
                @if(auth()->user()->role === 'kasir')
                    <a href="{{ route('pos.index') }}" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm">
                        Kembali ke Kasir (POS)
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm">
                        Kembali ke Dashboard
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 rounded-lg border border-gray-300 transition-colors text-sm">
                        Keluar / Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors text-sm">
                    Ke Halaman Login
                </a>
            @endauth
        </div>
    </div>
</body>
</html>
