<!-- File Blade yang akan digunakan sebagai template oleh file-file Blade lainnya -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Judul halaman -->
    <title>@yield('title')</title>
    <style>
        .form input, .form select {
            width: 30%;
        }
    </style>
</head>
<body>
    <!-- Teks Header halaman -->
    <h1>@yield('teks_header')</h1>

    <!-- Konten halaman -->
    @yield('content')
</body>
</html>
