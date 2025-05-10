# Sistem Manajemen Mahasiswa

Sebuah Sistem Manajemen Mahasiswa berbasis PHP yang menerapkan pola arsitektur Model-View-Presenter (MVP). Sistem ini memungkinkan pengelolaan data mahasiswa dengan fungsi dasar CRUD (Create, Read, Update, Delete).

## Ringkasan

Aplikasi ini mengikuti pola arsitektur MVP (Model-View-Presenter):
- **Model**: Menangani operasi basis data dan struktur data
- **View**: Mengelola lapisan presentasi
- **Presenter**: Menjadi penghubung antara komponen Model dan View

## Fitur

- Menampilkan daftar semua mahasiswa
- Menambahkan data mahasiswa baru
- Memperbarui informasi mahasiswa yang sudah ada
- Menghapus data mahasiswa
- Antarmuka responsif dengan gaya Bootstrap

## Kebutuhan Sistem

- PHP versi 7.0 atau lebih tinggi
- Database MySQL/MariaDB
- Web server (Apache/Nginx)

## Struktur Proyek

```
├── model/
│   ├── DB.class.php                # Pengelola koneksi database
│   ├── Mahasiswa.class.php         # Model data mahasiswa
│   ├── TabelMahasiswa.class.php    # Operasi database untuk mahasiswa
│   └── Template.class.php          # Mesin perender template
├── presenter/
│   └── ProsesMahasiswa.php        # Presenter utama untuk operasi mahasiswa
├── templates/
│   └── skin.html                  # Template HTML utama (tidak termasuk dalam file)
├── KontrakPresenter.php           # Interface presenter
├── KontrakView.php                # Interface view
├── TampilMahasiswa.php            # Implementasi view utama
└── index.php                      # Titik awal aplikasi (tidak termasuk dalam file)
```

## Skema Basis Data

Aplikasi ini menggunakan database MySQL dengan struktur berikut:

```sql
CREATE DATABASE mvp_php;

USE mvp_php;

CREATE TABLE mahasiswa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nim VARCHAR(20) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  tempat VARCHAR(50) NOT NULL,
  tl DATE NOT NULL,
  gender CHAR(1) NOT NULL,
  email VARCHAR(100) NOT NULL,
  telp VARCHAR(20) NOT NULL
);
```

## Instalasi

1. Kloning repositori ini atau unduh kode sumbernya
2. Buat database MySQL dengan nama `mvp_php`
3. Impor skema basis data (lihat SQL di atas)
4. Perbarui pengaturan koneksi database di `presenter/ProsesMahasiswa.php` jika diperlukan:
   ```php
   $db_host = "localhost";
   $db_user = "root";
   $db_password = "";
   $db_name = "mvp_php";
   ```
5. Tempatkan kode di dalam root dokumen web server Anda atau di subdirektori
6. Akses aplikasi melalui peramban web Anda

## Penggunaan

### Melihat Data Mahasiswa

Halaman utama menampilkan tabel dengan semua data mahasiswa. Setiap data menampilkan:
- NIM (Nomor Induk Mahasiswa)
- Nama
- Tempat Lahir
- Tanggal Lahir
- Jenis Kelamin
- Email
- Nomor Telepon

### Menambahkan Mahasiswa

1. Klik tombol "Tambah Data"
2. Isi formulir dengan informasi mahasiswa:
   - NIM
   - Nama
   - Tempat Lahir
   - Tanggal Lahir
   - Jenis Kelamin
   - Email
   - Telepon
3. Klik "Tambah" untuk menyimpan data baru

### Mengedit Data Mahasiswa

1. Klik tombol "Edit" di samping data mahasiswa yang ingin diubah
2. Perbarui informasi mahasiswa di formulir
3. Klik "Update" untuk menyimpan perubahan

### Menghapus Data Mahasiswa

1. Klik tombol "Hapus" di samping data mahasiswa yang ingin dihapus
2. Konfirmasi penghapusan di dialog konfirmasi
3. Klik "Hapus" untuk menghapus data secara permanen

## Detail Arsitektur

### Model

- **DB.class.php**: Mengelola koneksi database dan operasi query umum
- **Mahasiswa.class.php**: Mewakili entitas mahasiswa dengan atribut dan metode get/set
- **TabelMahasiswa.class.php**: Memperluas kelas DB untuk operasi database spesifik mahasiswa

### View

- **TampilMahasiswa.php**: Mengimplementasikan interface view untuk menampilkan data mahasiswa
- **Template.class.php**: Mesin template untuk menghasilkan HTML

### Presenter

- **ProsesMahasiswa.php**: Mengimplementasikan interface presenter untuk menangani logika bisnis
- **KontrakPresenter.php**: Interface yang mendefinisikan metode yang dibutuhkan oleh presenter
- **KontrakView.php**: Interface yang mendefinisikan metode yang dibutuhkan oleh view

## Lisensi

Proyek ini dibuat untuk tujuan edukasi.

## Kredit

Dibuat sebagai bagian dari proyek Programming Assistant 13 & 14.