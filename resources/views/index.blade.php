<!-- File Blade untuk menampilkan halaman awal (Daftar Produk) -->

<!-- Menggunakan file Blade bernama 'template' sebagai template -->
@extends('template')

<!-- Menampilkan halaman judul yang sesuai -->
@section('title', 'Tes Junior Programmer Fast Print')

<!-- Menampilkan teks header yang sesuai -->
@section('teks_header', 'Daftar Produk')

<!-- Menampilkan konten yang sesuai -->
@section('content')
    <!-- Tombol untuk ke halaman Tambah Produk -->
    <button onclick="location.href='/tambah_produk'">Tambah Produk</button>
    <br><br>

    <!-- Tabel untuk menampilkan daftar produk -->
    <table border="1" style="border-collapse:collapse">
        <!-- Header tabel -->
        <tr>
            <!-- Informasi terkait produk -->
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>

            <!-- Untuk mengubah produk -->
            <th>Edit</th>

            <!-- Untuk menghapus produk -->
            <th>Hapus</th>
        </tr>

        <!-- Loop untuk menampilkan data masing-masing produk -->
        @foreach ($daftar_produk as $produk)
            <tr>
                <!-- Data terkait produk -->
                <td>{{ $produk->id_produk }}</td>
                <td>{{ $produk->nama_produk }}</td>
                <td>Rp. {{ number_format($produk->harga) }}</td>
                <td>{{ $produk->nama_kategori }}</td>

                <td>
                    <!-- Tombol untuk mengubah produk berdasarkan ID produk -->
                    <button onclick="location.href='/edit_produk/{{$produk->id_produk}}'">Edit</button>
                </td>

                <td>
                    <!-- Tombol untuk menghapus produk berdasarkan ID produk dengan -->
                    <!-- memanggil suatu function bernama HapusProduk dengan -->
                    <!-- melemparkan 2 parameter yakni ID produk dan Nama produk -->
                    <button onclick="HapusProduk({{$produk->id_produk}}, '{{$produk->nama_produk}}')">Hapus</button>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Menampilkan pesan sukses jika produk baru berhasil ditambahkan -->
    <!-- Mengecek jika terdapat session dengan key 'sukses_tambah' -->
    @if (session('sukses_tambah'))
        <!-- Jika ya, maka suatu produk berhasil ditambahkan, tampilkan pesan sukses -->
        <script>alert('Produk berhasil ditambahkan!')</script>
    @endif

    <!-- Mengecek jika terdapat session dengan key 'sukses_edit' -->
    <!-- Menampilkan pesan sukses jika suatu produk berhasil diubah -->
    @if (session('sukses_edit'))
        <!-- Jika ya, maka suatu produk berhasil diubah, tampilkan pesan sukses -->
        <script>alert('Produk berhasil diubah!')</script>
    @endif

    <script>
        // Function untuk menghapus produk yang menerima 2 parameter yakni id_produk
        // yang adalah id_produk yang akan dihapus dan nama_produk yang adalah nama
        // produk yang akan dihapus
        function HapusProduk(id_produk, nama_produk) {
            // Menampilkan pesan konfirmasi hapus produk
            if (confirm(`Apakah anda yakin ingin menghapus produk ${nama_produk}?`)) {
                // Jika ditekan tombol "OK" maka arahkan ke URL hapus produk dengan
                // parameter ID adalah id_produk
                location.href = `/hapusProduk/${id_produk}`;
            }
        }
    </script>
@endsection
