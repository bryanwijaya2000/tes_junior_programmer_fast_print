<!-- File Blade untuk menampilkan halaman edit produk berdasarkan ID produk -->

<!-- Menggunakan file Blade bernama 'template' sebagai template -->
@extends('template')

<!-- Menampilkan halaman judul yang sesuai -->
@section('title', 'Edit Produk')

<!-- Menampilkan teks header yang sesuai -->
@section('teks_header', 'Edit Produk')

<!-- Menampilkan konten yang sesuai -->
@section('content')
    <!-- Form Edit Produk yang akan mengarahkan ke URL edit produk berdasarkan ID -->
    <!-- produk jika berhasil -->
    <form class="form" method="post" action="/editProduk/{{$produk->id_produk}}">
         <!-- Token CSRF untuk menghindari terjadinya form expired -->
        @csrf

        <!-- Label dan Inputan teks nama produk -->
        <!-- Inputan teks nama produk diganti dengan nama produk yang sedang diubah -->
        Nama Produk:
        <br>
        <input name="nama_produk" type="text" value="{{$produk->nama_produk}}" placeholder="Nama Produk">
        <br><br>

        <!-- Label dan Inputan teks harga produk -->
        <!-- Inputan teks harga produk diganti dengan harga produk yang sedang -->
        <!-- diubah -->
        Harga:
        <br>
        <input name="harga" type="text" value="{{$produk->harga}}" placeholder="Harga">
        <br><br>

        <!-- Label dan Inputan dropdown kategori produk -->
        Kategori:
        <br>
        <select name="kategori" value="">
             <!-- Nilai default kategori -->
            <option value="">Pilih Kategori</option>

            <!-- Loop untuk menampilkan daftar kategori -->
            @foreach ($daftar_kategori as $kategori)
                <!-- Proses menggantikan nilai kategori sekarang dengan nilai -->
                <!-- kategori produk yang sedang diubah -->
                <!-- Mengecek apakah ID kategori sekarang sama dengan ID kategori -->
                <!-- produk yang sedang diubah -->
                @if ($kategori->id_kategori == $produk->kategori_id)
                    <!-- Jika iya, maka gantikan nilai kategori sekarang dengan -->
                    <!-- nilai kategori produk -->
                    <option value="{{$kategori->id_kategori}}" selected>{{$kategori->nama_kategori}}</option>
                @else
                    <!-- Jika tidak, maka tidak ada yang dilakukan -->
                    <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                @endif
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
                <!-- Proses menggantikan nilai status sekarang dengan nilai status -->
                <!-- produk yang sedang diubah -->
                <!-- Mengecek apakah ID status sekarang sama dengan ID status produk -->
                <!-- yang sedang diubah -->
                @if ($status->id_status == $produk->status_id)
                     <!-- Jika iya, maka gantikan nilai status sekarang dengan nilai -->
                     <!-- status produk -->
                    <option value="{{$status->id_status}}" selected>{{$status->nama_status}}</option>
                @else
                    <!-- Jika tidak, maka tidak ada yang dilakukan -->
                    <option value="{{$status->id_status}}">{{$status->nama_status}}</option>
                @endif
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

        <!-- Tombol untuk mengubah produk -->
        <input type="submit" value="Edit">
    </form>
    <br>

    <!-- Tombol untuk batalkan ubah produk dan kembali ke halaman awal (Daftar -->
    <!-- Produk) -->
    <button onclick="location.href = '/'">Batalkan</button>
@endsection
