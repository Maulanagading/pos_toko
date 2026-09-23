<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <h3 class="text-lg font-semibold mb-2">Ringkasan Hari Ini</h3>
                <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}.</p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Contoh Status Stok (x-badge):</h4>
                    <div class="flex items-center gap-2">
                        <x-badge status="aman" />
                        <x-badge status="menipis" />
                        <x-badge status="habis" />
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>