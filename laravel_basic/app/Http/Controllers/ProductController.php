<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Log;

class ProductController extends Controller
{
    //Berikut adalah controller yang digunakan untuk mengelola produk
    //Controller ini memiliki beberapa method yang digunakan untuk menampilkan, menyimpan, memperbarui, dan menghapus produk

    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        //Menggunakan model product untuk mengambil semua produk
        $products = Product::all();

        //Mengirimkan data ke view halaman produk.
        //disini juga kita meengirimkan data semua products kehalaman products dengan method compact kita cukup mengetikan string dengan variable yang menambpung nilainya ini sudah bisa kita akses
        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan formulir untuk membuat produk baru.
     */
    public function create()
    {
        //hanya mereturn halaman
        return view('products.create');
    }

    /**
     * Menyimpan produk baru ke dalam database.
     */
    public function store(Request $request)
    {
        //controh jika kita ingin melihat request body yang kita kirimkan kita bisa menggunakan method info dari Log
        //cara mengakses method log eksekusi syntax ini diterminal gitbash tail -f storage/logs/laravel.log
        //jika powershell atau cmd: Get-Content -Path .\storage\logs\laravel.log -Wait
        Log::info('Request data: ', $request->all());

        //asalkan key dari request sama dengan key dari model kita bisa langsung menggunakan all
        Product::create($request->all());
        //ini akan langsung menyimpan data product ke database

        // ambil kembali data semua produk lalu kriimkan datnya untuk melihat perubahan produk terbaru
        $products = Product::all();
        //setelah itu return ke halaman product
        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan produk yang ditentukan.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Menampilkan formulir untuk mengedit produk yang ditentukan berdasarkan id.
     */
    public function edit(Product $product)
    {

        //ini akan di arahkan ke halaman form edit produk
        //di sini kita tidak membuat dan menginisialisakian variable product tetapi langsung mengambil dari parameter di atas public function edit(Product $product)
        //walaupun argumen yang kita masukan hanya angka(contoh diurlnya: /products/edit/1) di laravel sudah terdapat fitur dependency injection yang mana akan langsung di isi dengan data product berdasrkan id-nya
        return view('products.edit', compact('product'));
    }

    /**
     * Memperbarui produk yang ditentukan berdasarkan id.
     */
    public function update(Request $request, Product $product)
    {
        //berikut merupakan contoh jika kita ingin melakukan validasi terhadap requestnya

        //required artinya wajib diisi,
        // string artinya harus diisi dengan string,
        // integer artinya harus diisi dengan integer,
        // numeric artinya harus diisi dengan numeric bedanya dengan integer ini dapat menampung angka dibelakang koma,
        //max:255 artinya maksimal 255 karakter
        $validatData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        //sbeelum memperbarui data pastikan kita terapkan kondisi dimana (where) idnya sama dengan id produk yang ingin kita perbarui
        //lalu pangging method update dan masukan variabel validatData sebagai argumen
        //disini lebih jelas lagi jika kita validasi, hanya field yang divalidasi yang akan diperbarui karena $validateData memang hanya menampung field tersebut
        Product::where('id', $product->id)->update($validatData);

        //kita bisa langsung kembali ke halaman managemen produk, bisa dengan nama route yang sudah kita dewinisikan di file web.php:
        // kita juga bisa menambahkan flash session untuk menampilkan pesan sukses yang mana akan hilang jika kita refresh
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Menghapus produk yang ditentukan berdasarkan id.
     */
    public function destroy(Product $product)
    {
        //kita bisa memastikan productnya ada sebelum menghapusnya agar tidak terjadi error
        $product = Product::find($product->id);

        //jika produk nya tidak tersedia maka return ke halaman sebelumnya
        if (!$product) {
            //kita bisa mengirimkan pesan flash session yang hanya akan mucul sementara jika di refresh ini akan hilang
            return redirect()->back()->with('error', 'Product not found');
        }

        //jika produk ada maka kita bisa akan masuk ke tahapan menghapus produk
        $product->delete();

        //Laravel menyediakan mekanisme stateful seperti sesi, sehingga kita dapat mengarahkan pengguna kembali ke halaman sebelumnya dan mengirimkan pesan sukses
        //kita bisa langsung redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
