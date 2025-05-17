<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Aplikasi Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100 p-4 antialiased">

    <div class="w-full max-w-md bg-white rounded-xl shadow-2xl overflow-hidden">
        <div class="p-6 text-center">
            <h1 class="text-3xl font-bold text-gray-900">Selamat Datang di Aplikasi Anda</h1>
        </div>

        <div class="p-6 text-center">
            <p class="text-gray-600 mb-8">Mulai kelola produk Anda!</p>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="64"  height="64" viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"
                class="mx-auto text-blue-600 mb-8"
            >
                <path d="m7.5 4.27 9 5.15"/>
                <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                <path d="m3.3 7 8.7 5 8.7-5"/>
                <path d="M12 22V12"/>
            </svg>
        </div>

        <div class="p-6 bg-gray-50 flex justify-center">
            <a href="/products"
               class="inline-flex items-center justify-center h-12 px-8 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg text-lg shadow-md transition duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
                Ke Manajemen produk
            </a>
        </div>
    </div>

</body>
</html>
