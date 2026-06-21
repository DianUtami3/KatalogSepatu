# Nama : Dian Utami (2410501001)
# Nama : Chalieta Gabriella Tangkau (2410501012)

## Sistem Informasi Manajemen Inventori dan Penjualan pada G3S0 Store

Sistem Informasi Manajemen Inventori dan Penjualan ini adalah aplikasi berbasis web yang dirancang untuk mengelola operasional **G3S0 Store**. Aplikasi ini mencakup pengelolaan data produk, kategori, pelanggan, serta pencatatan transaksi penjualan secara terintegrasi.

## Fitur Utama
* **Manajemen Data Master:** CRUD (Create, Read, Update, Delete) untuk Produk, Kategori, dan Pelanggan.
* **Manajemen Transaksi:** Pencatatan data penjualan dan detail penjualan.
* **Dashboard Admin:** Antarmuka yang bersih dan responsif untuk kemudahan navigasi.
* **Sistem Database Relasional:** Data tersinkronisasi antar tabel untuk menjaga integritas informasi.

## Teknologi yang Digunakan
* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, JavaScript

## Cara Menjalankan Aplikasi
1. **Persiapan:** Pastikan XAMPP sudah terinstall dan jalankan **Apache** serta **MySQL** melalui XAMPP Control Panel.
2. **Database:** - Buka `phpMyAdmin` (biasanya `http://localhost/phpmyadmin`).
   - Buat database baru dengan nama **`katalog_sepatu`**.
   - Import file `database.sql` yang ada di dalam folder proyek ini ke dalam database tersebut.
3. **Konfigurasi:** Pastikan file `koneksi.php` sudah terhubung ke database `katalog_sepatu` dengan username dan password yang sesuai (default XAMPP: user `root`, pass ``).
4. **Deploy:** Pastikan folder proyek bernama **`KatalogSepatu`** dan letakkan di dalam direktori `C:\xampp\htdocs\`.
5. **Akses:** Buka browser dan ketik alamat berikut: `http://localhost/KatalogSepatu/`

## Struktur Database
Aplikasi ini terdiri dari tabel-tabel berikut:
- `kategori`
- `produk`
- `pelanggan`
- `penjualan`
- `detail_penjualan`

## Link Video Demo
https://drive.google.com/file/d/162EugR7PtvLF0kZzWvwyjpoAFWwyTqUW/view?usp=drivesdk 

## Lisensi
Proyek ini dibuat untuk keperluan tugas ujian akhir semester dan pengembangan sistem informasi inventori.
