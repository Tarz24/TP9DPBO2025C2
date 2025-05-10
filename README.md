**Saya Muhammad Akhtar Rizki Ramadha dengan NIM 2304742 mengerjakan soal Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.**

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
