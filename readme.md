# SISTEM INFORMASI LAUNDRY BERBASIS WEB

## Deskripsi Aplikasi

Sistem Informasi Laundry merupakan aplikasi berbasis web yang dikembangkan menggunakan framework CodeIgniter 3 dan database MySQL. Aplikasi ini dirancang untuk membantu pengelolaan operasional usaha laundry secara terkomputerisasi, mulai dari pengelolaan data pelanggan, pencatatan cucian, pelacakan status cucian, hingga pengelolaan riwayat transaksi.

---

## Latar Belakang

Pengelolaan usaha laundry secara manual sering menimbulkan berbagai kendala, seperti kesalahan pencatatan transaksi, kesulitan dalam memantau status cucian, serta kurang efektifnya pengelolaan data pelanggan. Oleh karena itu, dibangun Sistem Informasi Laundry berbasis web untuk membantu meningkatkan efisiensi, akurasi, dan kemudahan dalam pengelolaan usaha laundry.

---

## Tujuan Pembuatan Sistem

Tujuan pembuatan aplikasi ini adalah:

- Mempermudah pengelolaan data pelanggan.
- Mempermudah pencatatan transaksi laundry.
- Membantu pelacakan status cucian.
- Menyediakan riwayat transaksi secara terstruktur.
- Meningkatkan efisiensi pelayanan laundry.

---

## Fitur Sistem

| No | Fitur | Deskripsi |
|----|--------|-----------|
| 1 | Login dan Registrasi | Autentikasi pengguna sistem |
| 2 | Data Pelanggan | Mengelola data pelanggan |
| 3 | Daftar Cucian | Mengelola data cucian pelanggan |
| 4 | Tracking Cucian | Melakukan pelacakan status cucian |
| 5 | Riwayat Transaksi | Menampilkan riwayat transaksi |
| 6 | Logout | Keluar dari sistem |

---
=======
# SISTEM INFORMASI LAUNDRY BERBASIS WEB
### Menggunakan Framework CodeIgniter 3 dan Database MySQL

---

# DAFTAR ISI

1. Deskripsi Aplikasi
2. Latar Belakang
3. Tujuan Pembuatan Sistem
4. Fitur Sistem
5. Teknologi yang Digunakan
6. Struktur Database
7. Relasi Database
8. Struktur Project
9. Cara Instalasi dan Menjalankan Program
10. Panduan Penggunaan Sistem
11. Screenshot Program
12. Anggota Kelompok
13. Kesimpulan

---

# 1. Deskripsi Aplikasi

Sistem Informasi Laundry merupakan aplikasi berbasis web yang dibangun menggunakan framework CodeIgniter 3 dan database MySQL. Aplikasi ini dirancang untuk membantu proses pengelolaan usaha laundry secara terkomputerisasi, mulai dari pengelolaan data pelanggan, pencatatan transaksi laundry, pelacakan status cucian, hingga penyimpanan riwayat transaksi.

Dengan adanya sistem ini, proses administrasi laundry dapat dilakukan dengan lebih efektif, efisien, serta meminimalisir kesalahan pencatatan yang sering terjadi pada sistem manual.

---

# 2. Latar Belakang

Pengelolaan usaha laundry secara manual sering menimbulkan berbagai permasalahan, seperti kehilangan data pelanggan, kesalahan pencatatan transaksi, kesulitan dalam memantau status cucian, serta penyimpanan arsip yang kurang terorganisir.

Perkembangan teknologi informasi memungkinkan proses pengelolaan usaha dilakukan secara digital. Oleh karena itu, dibuatlah Sistem Informasi Laundry berbasis web untuk membantu proses pengelolaan pelanggan, pencatatan transaksi, pelacakan status cucian, dan pengelolaan riwayat transaksi secara lebih efektif dan efisien.

---

# 3. Tujuan Pembuatan Sistem

Tujuan pembuatan aplikasi ini adalah:

- Mempermudah pengelolaan data pelanggan.
- Mempermudah pencatatan transaksi laundry.
- Membantu pelacakan status cucian.
- Menyimpan riwayat transaksi secara terstruktur.
- Mengurangi kesalahan pencatatan manual.
- Meningkatkan efektivitas dan efisiensi pelayanan laundry.

---

# 4. Fitur Sistem

| No | Fitur | Deskripsi |
|----|--------|-----------|
| 1 | Login | Autentikasi pengguna |
| 2 | Registrasi | Pembuatan akun pengguna |
| 3 | Data Pelanggan | CRUD data pelanggan |
| 4 | Daftar Cucian | Input transaksi laundry |
| 5 | Tracking Cucian | Pelacakan status cucian |
| 6 | Riwayat | Menampilkan riwayat transaksi |
| 7 | Logout | Keluar dari sistem |

---

# 5. Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| PHP | Bahasa Pemrograman |
| CodeIgniter 3 | Framework |
| MySQL | Database Management System |
| Bootstrap | Framework CSS |
| HTML | Struktur halaman |
| CSS | Tampilan halaman |
| JavaScript | Interaktivitas |
| XAMPP | Local Server |

---

# 6. Struktur Database

Buat Database dengan nama:

```sql
uas
```

Lalu import uas.sql ke dalam Mysql admin.

Database tersebut terdiri dari beberapa tabel berikut.

---

## 6.1 Tabel Kasir

Tabel ini digunakan untuk menyimpan data pengguna yang dapat mengakses sistem.

| Field | Tipe Data | Keterangan |
|-------|-----------|------------|
| id_kasir | int | Primary Key |
| nama_kasir | varchar | Nama pengguna |
| email | varchar | Email pengguna |
| password | varchar | Password pengguna |

---

## 6.2 Tabel Pelanggan

Tabel ini digunakan untuk menyimpan data pelanggan laundry.

| Field | Tipe Data | Keterangan |
|-------|-----------|------------|
| id_pelanggan | int | Primary Key |
| nama_pelanggan | varchar | Nama pelanggan |
| nomor_wa | varchar | Nomor WhatsApp |
| alamat | text | Alamat pelanggan |

---

## 6.3 Tabel Paket Laundry

Tabel ini digunakan untuk menyimpan jenis paket laundry.

| Field | Tipe Data | Keterangan |
|-------|-----------|------------|
| id_paket | int | Primary Key |
| nama_paket | varchar | Nama paket |
| harga_per_kg | int | Harga per kilogram |

---

## 6.4 Tabel Daftar Cucian

Tabel ini digunakan untuk menyimpan transaksi laundry.

| Field | Tipe Data | Keterangan |
|-------|-----------|------------|
| id_cucian | int | Primary Key |
| no_resi | varchar | Nomor resi |
| id_pelanggan | int | Foreign Key |
| id_kasir | int | Foreign Key |
| id_paket | int | Foreign Key |
| berat_laundry | decimal | Berat laundry |
| total_biaya | int | Total biaya |
| tgl_masuk | datetime | Tanggal masuk |
| status_cucian | varchar | Status cucian |

---

## 6.5 Tabel Riwayat

Tabel ini digunakan untuk menyimpan arsip transaksi laundry.

| Field | Tipe Data | Keterangan |
|-------|-----------|------------|
| id_riwayat | int | Primary Key |
| no_resi | varchar | Nomor resi |
| id_cucian | int | ID cucian |
| nama_pelanggan_arsip | varchar | Nama pelanggan |
| nomor_wa_arsip | varchar | Nomor WhatsApp |
| nama_paket_arsip | varchar | Nama paket |
| total_biaya_final | int | Total biaya |
| berat_laundry | decimal | Berat laundry |
| tgl_diambil | datetime | Tanggal pengambilan |
| status_cucian | varchar | Status transaksi |

---

# 7. Relasi Database

```
Kasir
   │
   └──────────────┐
                  │
Pelanggan ───> Daftar_Cucian <── Paket_Laundry
                      │
                      ▼
                   Riwayat
```

---

# 8. Struktur Project

```
pwebUAS
│
├── application
│   ├── controllers
│   │   ├── Auth.php
│   │   ├── Pelanggan.php
│   │   ├── Daftarcucian.php
│   │   ├── Tracking.php
│   │   └── Riwayat.php
│   │
│   ├── models
│   │   ├── Kasir_model.php
│   │   ├── Pelanggan_model.php
│   │   ├── Daftarcucian_model.php
│   │   ├── Tracking_model.php
│   │   └── Riwayat_model.php
│   │
│   └── views
│
├── assets
├── system
├── uploads
└── index.php
```

---

# 9. Cara Instalasi dan Menjalankan Program

## Langkah 1
Install aplikasi berikut:

- XAMPP
- Visual Studio Code

## Langkah 2
Salin folder project ke:

```
C:\xampp\htdocs\pwebUAS
```

## Langkah 3
Jalankan:

- Apache
- MySQL

## Langkah 4
Buat database:

```sql
CREATE DATABASE uas;
```

## Langkah 5
Import file:

```
uas.sql
```

melalui phpMyAdmin.

## Langkah 6
Buka browser:

```
http://localhost/pwebUAS
```

---

# 10. Panduan Penggunaan Sistem

## A. Registrasi

1. Buka halaman registrasi.
2. Masukkan nama.
3. Masukkan email.
4. Masukkan password.
5. Klik tombol daftar.

---

## B. Login

1. Masukkan nama.
2. Masukkan email.
3. Masukkan password.
4. Klik tombol login.

---

## C. Menu Pelanggan

Fitur yang tersedia:

- Menambah pelanggan.
- Mengedit pelanggan.
- Menghapus pelanggan.
- Melihat daftar pelanggan.

---

## D. Menu Daftar Cucian

Fitur yang tersedia:

- Menambahkan transaksi laundry.
- Memilih paket laundry.
- Menginput berat cucian.
- Menyimpan transaksi.

---

## E. Menu Tracking

Fitur yang tersedia:

- Melihat status cucian.
- Memantau progres laundry.

Status cucian:

- Diproses
- Dicuci
- Dikeringkan
- Disetrika
- Selesai
- Sudah Diambil

---

## F. Menu Riwayat

Fitur yang tersedia:

- Melihat riwayat transaksi.
- Melihat detail transaksi.
- Menyimpan arsip transaksi.

---

## G. Logout

Digunakan untuk keluar dari sistem secara aman.

---

# 11. Screenshot Program

Tambahkan screenshot berikut:

- Halaman Login
- Halaman Registrasi
- Halaman Pelanggan
- Halaman Daftar Cucian
- Halaman Tracking
- Halaman Riwayat

---

# 12. Anggota Kelompok

| No | Nama | NIM |
|----|------|-----|
| 1 | Hilmi Syakbana | 24010110026 |
| 2 | Abdul Nabil Qois Marzuqi | 24010110021 |
| 3 | Madzakirat Akbar Ayubi | 24010110039 |
| 4 | Dwi Sepdiantoro | 24010110045 |

---

# 13. Kesimpulan

Sistem Informasi Laundry berbasis web ini dapat membantu proses administrasi laundry menjadi lebih efektif, efisien, dan terorganisir. Dengan adanya fitur pengelolaan pelanggan, pencatatan transaksi, pelacakan status cucian, dan riwayat transaksi, proses bisnis laundry dapat dilakukan dengan lebih mudah, cepat, dan akurat.
