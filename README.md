<div align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
    <br/><br/>
    <h1>Aplikasi Manajemen Laundry</h1>
    <p>Sistem Informasi Manajemen Laundry berbasis Web yang dikembangkan menggunakan Framework Laravel 8. Proyek ini merupakan hasil magang dan kolaborasi, dirancang untuk mempermudah pengelolaan pesanan laundry baik berdasarkan kiloan maupun satuan (biji).</p>
</div>

---

## 🚀 Fitur Utama

Aplikasi ini dibagi menjadi 2 hak akses (role): **Admin** dan **Pelanggan (User)**.

### 👨‍💼 Fitur Admin
- **Dashboard Admin**: Ringkasan data pesanan dan pelanggan.
- **Manajemen Pelanggan**: Menambah dan melihat daftar pelanggan yang terdaftar.
- **Manajemen Pesanan (Order)**: 
  - Melihat seluruh daftar pesanan laundry.
  - Mengubah status pesanan menjadi sedang diproses.
  - Menyelesaikan pesanan.

### 👤 Fitur Pelanggan (User)
- **Dashboard Pelanggan**: Halaman utama untuk pelanggan.
- **Pesan Laundry (Kiloan)**: Memesan jasa laundry berdasarkan berat (Kg).
- **Pesan Laundry (Satuan/Biji)**: Memesan jasa laundry berdasarkan jumlah pakaian/barang.

---

## 💻 Tech Stack

- **Backend**: Laravel 8.75 (PHP ^7.3 / ^8.0)
- **Frontend**: Bootstrap 5.1.3, Sass, Laravel Mix
- **Database**: MySQL
- **Lainnya**: Artisan, Composer, NPM

---

## 📸 Screenshots

*(Catatan: Silakan ganti URL gambar di bawah ini dengan screenshot asli aplikasi Anda)*

| Dashboard Admin | Form Pesanan (Kiloan) |
| :---: | :---: |
| <img src="https://via.placeholder.com/500x300.png?text=Dashboard+Admin" alt="Dashboard Admin"> | <img src="https://via.placeholder.com/500x300.png?text=Form+Pesan+Kiloan" alt="Form Pesanan Kiloan"> |
| **Daftar Pesanan** | **Dashboard User** |
| <img src="https://via.placeholder.com/500x300.png?text=Daftar+Pesanan" alt="Daftar Pesanan"> | <img src="https://via.placeholder.com/500x300.png?text=Dashboard+User" alt="Dashboard User"> |

---

## 🛠️ Persyaratan Sistem (Prerequisites)

Sebelum menginstal aplikasi ini, pastikan sistem Anda memiliki:
- [PHP](https://www.php.net/) (Versi 7.3 atau 8.0 ke atas)
- [Composer](https://getcomposer.org/)
- [Node.js & NPM](https://nodejs.org/) (Opsional untuk compile asset)
- Web Server (Apache/Nginx) misal: XAMPP, Laragon, dll.
- MySQL Database

---

## ⚙️ Panduan Instalasi (Cara Pakai)

Ikuti langkah-langkah di bawah ini untuk menjalankan project di lokal Anda:

1. **Clone atau Download Repository**
   ```bash
   git clone <url-repository-anda>
   cd Laundry
   ```

2. **Install Dependensi PHP (Composer)**
   ```bash
   composer install
   ```

3. **Install Dependensi NPM (Opsional)**
   ```bash
   npm install
   npm run dev
   ```

4. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env`.
   ```bash
   cp .env.example .env
   ```
   Buka file `.env` dan atur konfigurasi database Anda (misalnya `DB_DATABASE=laundry`).

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database & Seeder**
   Pastikan Anda sudah membuat database kosong di MySQL, lalu jalankan:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui `http://localhost:8000`.

---

## 🔐 Akses Login Default

Setelah melakukan `db:seed`, Anda bisa menggunakan akun berikut untuk login:

### 1. Akun Admin
- **Email**: `admin@gmail.com`
- **Password**: `11`

### 2. Akun Pelanggan (User)
- **Email**: `user1@gmail.com`
- **Password**: `11`
- **Email**: `user2@gmail.com`
- **Password**: `11`

---

## 🤝 Kolaborasi & Kredit

Aplikasi ini dikembangkan sebagai hasil dari kegiatan **Magang / Praktik Kerja**. 
Terima kasih kepada teman-teman magang yang telah berkolaborasi dalam proses pengembangan dan penyelesaian aplikasi ini.

Dibuat dengan ❤️ oleh **[Nama Anda/Tim Anda]**.

---
