<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Konfigurasi

Sebelum menjalankan laravel pastikan buat file .env terlebih dahulu jika sudah bisa copy and paste dari contoh file .env.example

sesuaikan konfigurasi env nya berdasrkan konfigurasi tools & stack maisng masing

setelah itu masuk ke root directory lalu migrate stukrtur table agar sama php artisan migrate, jika menggunakan database yangsudah ada dan error  gunakan syntax ini: php artisan migrate:fresh (singkatnya ini menghapush struktur table sebelumnya dan membangun yang bagru)

lalu jalankan composer run dev dan buka aplikasi sesuai dengan ip server local nya http://127.0.0.1:8000 (tergantung url masing masing)
