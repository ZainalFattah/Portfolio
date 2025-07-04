# Proyek Portofolio Web

Ini adalah proyek portofolio web sederhana yang dibangun menggunakan PHP dan MySQL. Proyek ini memungkinkan pengguna untuk menampilkan proyek-proyek mereka dan mengelolanya melalui dasbor admin.

## Fitur

*   **Otentikasi Pengguna:** Sistem login dan logout yang aman untuk admin.
*   **Manajemen Proyek:** Admin dapat menambah, mengedit, dan menghapus proyek.
*   **Tampilan Proyek:** Pengguna dapat melihat daftar proyek dan detail masing-masing proyek.
*   **Desain Responsif:** Antarmuka yang dapat diakses di berbagai perangkat.

## Teknologi yang Digunakan

*   **Backend:** PHP
*   **Frontend:** HTML, CSS, JavaScript
*   **Database:** MySQL
*   **Lainnya:** Three.js untuk rendering model 3D

## Struktur File

```
.
├── index.php
├── login.php
├── logout.php
├── project.php
├── assets
│   ├── css
│   │   └── style.css
│   ├── images
│   ├── js
│   │   ├── main.js
│   │   └── three.min.js
│   └── models
├── includes
│   ├── auth.php
│   └── db.php
└── pages
    ├── add_project.php
    ├── dashboard.php
    ├── delete_project.php
    ├── edit_project.php
    └── project_detail.php
```

## Instalasi dan Penggunaan

1.  **Clone repository:**
    ```bash
    git clone https://github.com/ZainalFattah/Portfolio.git
    ```
2.  **Pindahkan file:** Pindahkan semua file proyek ke direktori `htdocs` pada instalasi XAMPP Anda.
3.  **Database:**
    *   Buat database baru di phpMyAdmin.
    *   Impor file `.sql` yang berisi struktur tabel yang diperlukan (jika ada).
    *   Konfigurasi koneksi database di `includes/db.php` dengan informasi database Anda.
4.  **Jalankan Aplikasi:**
    *   Buka browser dan akses `http://localhost/nama_folder_proyek`.
    *   Login sebagai admin untuk mengelola proyek.
