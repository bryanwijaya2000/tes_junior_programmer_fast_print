# Tes Junior Programmer Fast Print

# Pendahuluan
Dalam proyek ini telah dibangun website admin toko online sederhana dimana data diambil dari sebuah API publik. Fitur-fitur yang ada dalam situs ini adalah melihat daftar produk, menambahkan produk, mengubah produk, dan menghapus produk. API publik dapat diakses pada URL dibawah ini:

https://recruitment.fastprint.co.id/tes/api_tes_programmer

# Web Stack
Web stack yang digunakan pada proyek ini adalah XAMPP. Ada 2 modul service yang digunakan yaitu Apache yang berfungsi sebagai web server untuk menjalankan website pada browser dan MySQL untuk berkomunikasi dengan database yang digunakan dan juga mengambil, menambah, mengubah, dan menghapus data yang ada pada database tersebut.

# Database
Database dibuat dengan MySQL pada DBMS phpMyAdmin. Database diberi nama tes_junior_programmer_fast_print_db. Terdapat 3 tabel pada database ini yakni produk, kategori, dan status. Tabel produk berisi data produk dan memiliki 4 kolom yaitu id_produk yang adalah primary key, nama_produk yang adalah nama dari produk, harga yang adalah harga dari produk, kategori_id yang adalah kategori produk dan berupa foreign key ke primary key tabel kategori, dan status_id yang adalah status produk dan berupa foreign key ke primary key tabel status. Tabel kategori berisi data kategori produk dan memiliki 2 kolom yaitu id_kategori yang adalah primary key dan nama_kategori yang adalah nama dari kategori. Tabel status berisi data status produk dan memiliki 2 kolom yaitu id_status yang adalah primary key dan nama_status yang adalah nama dari status. 

# Website
Pada proyek ini website dibangun dengan menggunakan framework Laravel. Agar dapat membuat koneksi ke database pada file .env nilai DB_CONNECTION diubah menjadi mysql dan nilai DB_DATABASE diubah menjadi tes_junior_programmer_fast_print_db. Pada direktori
./app/resources/views/ ditambah 4 file Blade yakni template yang digunakan sebagai template untuk file-file Blade lainnya, index yang adalah halaman awal yang berisi daftar produk yang ditampilkan saat website dibuka, tambah_produk yang adalah halaman untuk menambahkan produk baru, dan edit_produk yang adalah halaman untuk mengubah suatu produk. Pada direktori ./app/Models/ ditambah 3 Model baru yakni Produk yang mereferensi ke tabel produk pada database, Kategori yang mereferensi ke tabel kategori pada database, dan Status yang mereferensi ke tabel status pada database. Pada direktori ./app/Controllers ditambah 2 Controller baru yakni ViewController yang berfungsi untuk menampilkan view atau halaman dengan tampilan diambil dari file-file Blade yang telah ditambahkan dan ProdukController yang berfungsi untuk melakukan operasi-operasi CRUD pada produk (Tambah produk, Edit produk, dan Hapus produk). Pada file ./routes/web.php ditambahkan 6 route dengan 3 route pertama digunakan untuk menampilkan halaman awal daftar produk, halaman tambah produk, dan halaman ubah produk masing-masing dan 3 route terakhir digunakan untuk menambahkan produk baru, mengubah suatu produk, dan menghapus suatu produk masing-masing.
