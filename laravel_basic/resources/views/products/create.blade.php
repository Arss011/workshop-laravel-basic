@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 md:p-8 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Tambah Produk Baru</h1>
        {{-- bisa kita langsung arahkan kembali ke halaman management produk /products --}}
        {{-- atau bisa kita pakai nama route yang sudha kita definisikan di web.php (ini lebih direkomendasikan unutk memudahkan memlihara code) --}}
        <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-700 transition duration-150 ease-in-out flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow" role="alert">
            <p class="font-bold">Terjadi Kesalahan:</p>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/products" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-500 @enderror"
                   placeholder="Masukkan nama produk">
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('description') border-red-500 @enderror"
                      placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('price') border-red-500 @enderror"
                       placeholder="Contoh: 50000">
                @error('price')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('stock') border-red-500 @enderror"
                       placeholder="Contoh: 100">
                @error('stock')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-150 ease-in-out flex items-center">
                <i class="fas fa-save mr-2"></i> Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection
