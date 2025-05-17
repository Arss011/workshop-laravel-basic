<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aplikasi Produk Laravel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @stack('styles') </head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-700">Manajemen Produk</a>
                </div>
                <div>
                    </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="bg-white shadow-md mt-12">
        <div class="container mx-auto px-6 py-4 text-center text-gray-600 text-sm">
            &copy; {{ date('Y') }} Workshop Laravel</i>.
        </div>
    </footer>

    @stack('scripts') </body>
</html>
