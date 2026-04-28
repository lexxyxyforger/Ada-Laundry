<p align="center"> <img src="https://laravel.com/img/logotype.min.svg" width="300"> </p>
AdaLaundry

AdaLaundry adalah aplikasi manajemen laundry berbasis web yang membantu mengelola transaksi, pelanggan, status cucian, dan laporan secara efisien dalam satu sistem terintegrasi.

Aplikasi ini dirancang dengan tampilan modern dan alur yang sederhana untuk mempermudah operasional bisnis laundry.

Fitur Utama
Manajemen transaksi laundry
Tracking status cucian
Dashboard admin & member
Manajemen pelanggan
Sistem poin & voucher
Laporan dan statistik
Demo Akses

Admin:

Email: admin@adalaundry.com
Password: AdaLaundry222
Teknologi yang Digunakan
Laravel 9
MySQL
Tailwind CSS
Docker (opsional)
Instalasi
Clone repository
git clone https://github.com/username/adalaundry.git
cd adalaundry
Copy file environment
cp .env.example .env
Generate app key
php artisan key:generate
Setup database di file .env
DB_DATABASE=adalaundry
DB_USERNAME=root
DB_PASSWORD=
Migrasi database
php artisan migrate
Jalankan aplikasi
php artisan serve

Buka di browser:
http://localhost:8000

Struktur Role
Admin → mengelola transaksi, member, laporan
Member → melihat transaksi, poin, dan status laundry
Catatan

Project ini dikembangkan sebagai bagian dari pembelajaran dan telah diupgrade ke Laravel 9 dengan peningkatan struktur dan UI.

Tujuan Project

Membuat sistem laundry yang:

mudah digunakan
efisien
siap dikembangkan ke level production
Lisensi

Project ini bersifat open-source dan bebas digunakan untuk pembelajaran maupun pengembangan lebih lanjut.