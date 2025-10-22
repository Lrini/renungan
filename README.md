# 🌿 Renungan Harian - Devosi

Aplikasi web berbasis Laravel untuk menyajikan renungan harian secara dinamis dan terstruktur. Cocok digunakan oleh komunitas rohani, gereja, atau individu yang ingin memperdalam refleksi spiritual setiap hari.

## ✨ Fitur Utama

- 📖 **Renungan Harian**: Menampilkan konten renungan yang dapat diperbarui secara berkala.
- 🔐 **Manajemen Pengguna**: Sistem login dan pengaturan peran (role) pengguna.
- 🗂️ **Dashboard Admin**: Kelola konten renungan, pengguna, dan aktivitas lainnya.
- 🎨 **Tampilan Responsif**: Menggunakan Blade dan Tailwind CSS untuk antarmuka yang modern dan mobile-friendly.
- 📅 **Kegiatan & Seminar**: (Fitur dalam pengembangan) Menampilkan jadwal kegiatan rohani.

## 🛠️ Teknologi yang Digunakan

- **Laravel** (PHP Framework)
- **Blade** (Template Engine Laravel)
- **Tailwind CSS** (Utility-first CSS framework)
- **MySQL** (Database)
- **JavaScript** (Interaktivitas dasar)

## 📦 Persyaratan Instalasi

Pastikan kamu sudah menginstal:

- PHP >= 8.0
- Composer
- MySQL
- Node.js & npm (untuk frontend build)

## 🚀 Cara Instalasi
# Clone repository
git clone https://github.com/Lrini/renungan.git
cd renungan

# Install dependencies
composer install
npm install && npm run dev

# Copy file environment
cp .env.example .env

# Generate key dan migrasi database
php artisan key:generate
php artisan migrate

# Jalankan server lokal
php artisan serve
