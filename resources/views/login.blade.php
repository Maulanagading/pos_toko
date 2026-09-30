<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Login - POS Barokah Mart</title>
    {{-- Memuat aset CSS & JS via Vite (Tailwind CSS) --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    {{-- Card Container Formulir Login --}}
    <div class="bg-white p-8 rounded-lg shadow-sm w-full max-w-sm">
        <h1 class="text-xl font-semibold mb-6 text-center">POS Barokah Mart</h1>

        {{-- Menampilkan pesan error validasi jika autentikasi gagal --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form Login: Mengirim POST ke route 'login.store' --}}
        <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
            {{-- Token keamanan CSRF Laravel untuk mencegah Cross-Site Request Forgery --}}
            @csrf

            {{-- Input Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    required autofocus>
            </div>

            {{-- Input Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    required>
            </div>

            {{-- Tombol Aksi Submit --}}
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>

