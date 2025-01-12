<!-- File Blade untuk menampilkan halaman tambah produk -->

<!-- Menggunakan file Blade bernama 'template' sebagai template -->
@extends('template')

<!-- Menampilkan halaman judul yang sesuai -->
@section('title', 'Tambah Produk')

<!-- Menampilkan teks header yang sesuai -->
@section('teks_header', 'Tambah Produk')

<!-- Menampilkan konten yang sesuai -->
@section('content')
    <!-- Form Tambah Produk yang akan mengarahkan ke URL tambah produk jika berhasil -->
    <form class="form" method="post" action="/tambahProduk">
        <!-- Token CSRF untuk menghindari terjadinya form expired -->
        @csrf

        <!-- Label dan Inputan teks nama produk -->
        Nama Produk:
        <br>
        <input name="nama_produk" type="text" value="" placeholder="Nama Produk">
        <br><br>

        <!-- Label dan Inputan teks harga produk -->
        Harga:
        <br>
        <input name="harga" type="text" value="" placeholder="Harga">
        <br><br>

        <!-- Label dan Inputan dropdown kategori produk -->
        Kategori:
        <br>
        <select name="kategori" value="">
            <!-- Nilai default kategori -->
            <option value="">Pilih Kategori</option>

            <!-- Loop untuk menampilkan daftar kategori -->
            @foreach ($daftar_kategori as $kategori)
                <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
            @endforeach
        </select>
        <br><br>

        <!-- Inputan dropdown status produk -->
        Status:
        <br>
        <select name="status" value="">
             <!-- Nilai default status -->
            <option value="">Pilih Status</option>

            <!-- Loop untuk menampilkan daftar status -->
            @foreach ($daftar_status as $status)
                <option value="{{$status->id_status}}">{{$status->nama_status}}</option>
            @endforeach
        </select>
        <br><br>

        <!-- Mengecek adanya eror -->
        @if ($errors->any())
            <!-- Jika iya, maka tampilkan semua eror yang ada per baris dengan -->
            <!-- warna merah -->
            @foreach ($errors->all() as $error)
                <div style="color:red">{{$error}}</div>
            @endforeach
        @endif
        <br>

        <!-- Tombol untuk menambahkan produk -->
        <input type="submit" value="Tambah">
    </form>
    <br>

    <!-- Tombol untuk batalkan tambah produk dan kembali ke halaman awal (Daftar Produk) -->
    <button onclick="location.href = '/'">Batalkan</button>
@endsection
