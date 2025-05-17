@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 md:p-8 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Edit Produk: {{ $product->name ?? 'products Dummy' }}</h1>
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

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT') {{-- atau PATCH, sesuaikan dengan route Anda --}}

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama product</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? 'Nama product Dummy') }}" required
                   class="mt-1 block w-full px-4 py-2 border  rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-500 @enderror"
                   placeholder="Masukkan nama product">
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('description') border-red-500 @enderror"
                      placeholder="Masukkan deskripsi product">{{ old('description', $product->description ?? 'Deskripsi product dummy.') }}</textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? 100000) }}" required
                       class="mt-1 block w-full px-4 py-2 borderrounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('price') border-red-500 @enderror"
                       placeholder="Contoh: 50000">
                @error('harga')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? 10) }}" required
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('stock') border-red-500 @enderror"
                       placeholder="Contoh: 100">
                @error('stok')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-150 ease-in-out flex items-center">
                <i class="fas fa-sync-alt mr-2"></i> Update products
            </button>
        </div>
    </form>
</div>
@endsection
