@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

<div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700 mb-4 md:mb-0">Daftar Produk</h1>
        <a href="/products/create" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Produk Baru
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow" role="alert">
            <p class="font-bold">Gagal!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                {{-- Ganti dengan data dari controller --}}
                @forelse ($products ?? [] as $key => $produk)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk['name'] ?? 'Nama Produk Dummy' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($produk['description'] ?? 'Deskripsi produk dummy yang cukup panjang agar bisa dilihat efek limitasinya.', 50) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($produk['price'] ?? 100000, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk['stock'] ?? 10 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="/products/edit/{{ $produk['id'] ?? 1 }}"  class="text-indigo-600 hover:text-indigo-800 transition duration-150 ease-in-out mr-3" title="Edit">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <button onclick="confirmDelete({{ $produk['id'] ?? 1 }})" class="text-red-600 hover:text-red-800 transition duration-150 ease-in-out" title="Hapus">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </button>
                        <form id="delete-form-{{ $produk['id'] ?? 1 }}" action="{{ route('products.destroy', $produk['id'] ?? 1) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        Belum ada data produk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "Data produk ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endpush

@endsection
