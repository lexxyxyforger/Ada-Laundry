<div align="center">

<img src="https://laravel.com/img/logotype.min.svg" width="250" alt="Laravel">

<br/><br/>

# 🧺 AdaLaundry

### Sistem Manajemen Laundry Modern Berbasis Web

[![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Docker](https://img.shields.io/badge/Docker-Optional-2496ED?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com)
[![License](https://img.shields.io/badge/License-Open%20Source-brightgreen?style=for-the-badge)](LICENSE)

<br/>

> **AdaLaundry** adalah aplikasi manajemen laundry berbasis web yang membantu mengelola transaksi, pelanggan, status cucian, dan laporan secara efisien — semuanya dalam satu sistem terintegrasi dengan tampilan modern.

<br/>

[🚀 Demo Live](#-demo-akses) · [📦 Instalasi](#-instalasi) · [✨ Fitur](#-fitur-utama) · [🤝 Kontribusi](#-kontribusi)

</div>

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|---|---|
| 📋 **Manajemen Transaksi** | Catat dan kelola setiap transaksi laundry dengan mudah |
| 🔄 **Tracking Status Cucian** | Pantau status cucian secara real-time dari masuk hingga selesai |
| 🖥️ **Dashboard Admin & Member** | Tampilan dashboard yang berbeda dan optimal untuk tiap role |
| 👥 **Manajemen Pelanggan** | Kelola data pelanggan dengan sistem yang terstruktur |
| 🎁 **Sistem Poin & Voucher** | Program loyalitas pelanggan dengan reward poin dan voucher diskon |
| 📊 **Laporan & Statistik** | Laporan lengkap untuk analisis performa bisnis laundry Anda |

---

## 🚀 Demo Akses

Coba langsung aplikasinya tanpa perlu instalasi:

```
🌐 URL     : http://localhost:8000
👤 Email   : admin@adalaundry.com
🔑 Password: AdaLaundry222
```

---

## 🛠️ Teknologi yang Digunakan

- **[Laravel 9](https://laravel.com)** — Backend framework PHP yang powerful dan elegan
- **[MySQL](https://www.mysql.com)** — Database relasional yang andal
- **[Tailwind CSS](https://tailwindcss.com)** — Utility-first CSS framework untuk UI modern
- **[Docker](https://www.docker.com)** *(opsional)* — Containerization untuk deployment yang konsisten

---

## 📦 Instalasi

### Prasyarat

Pastikan kamu sudah menginstal:
- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/username/adalaundry.git
cd adalaundry
```

**2. Install dependencies**
```bash
composer install
npm install && npm run build
```

**3. Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Konfigurasi database**

Buka file `.env` dan sesuaikan:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adalaundry
DB_USERNAME=root
DB_PASSWORD=
```

**5. Migrasi & seed database**
```bash
php artisan migrate --seed
```

**6. Jalankan server**
```bash
php artisan serve
```

**7. Buka di browser**
```
http://localhost:8000
```

> 💡 **Menggunakan Docker?** Jalankan `docker-compose up -d` dan skip langkah 6.

---

## 👥 Struktur Role

```
AdaLaundry
├── 🔑 Admin
│   ├── Kelola transaksi
│   ├── Kelola data member
│   └── Akses laporan & statistik
│
└── 👤 Member
    ├── Lihat riwayat transaksi
    ├── Cek poin & voucher
    └── Pantau status laundry
```

---

## 📁 Struktur Proyek

```
adalaundry/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Services/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   └── js/
├── routes/
└── public/
```

---

## 🎯 Tujuan Proyek

Proyek ini dikembangkan dengan tiga prinsip utama:

- 🟢 **Mudah Digunakan** — Antarmuka yang intuitif untuk semua kalangan
- ⚡ **Efisien** — Alur kerja yang disederhanakan untuk operasional sehari-hari
- 🔧 **Siap Dikembangkan** — Arsitektur yang bersih dan scalable menuju production

---

## 📝 Catatan Pengembangan

Proyek ini merupakan bagian dari proses pembelajaran dan telah diupgrade ke **Laravel 9** dengan peningkatan signifikan pada struktur kode dan tampilan UI.

---

## 🤝 Kontribusi

Kontribusi sangat terbuka! Ikuti langkah berikut:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/fitur-baru`)
3. Commit perubahan (`git commit -m 'feat: tambah fitur baru'`)
4. Push ke branch (`git push origin feature/fitur-baru`)
5. Buat Pull Request

---

## 📄 Lisensi

Proyek ini bersifat **open-source** dan bebas digunakan untuk keperluan pembelajaran maupun pengembangan lebih lanjut.

---

<div align="center">

Dibuat dengan ❤️ menggunakan Laravel

⭐ **Jangan lupa kasih bintang kalau project ini bermanfaat!** ⭐

</div>