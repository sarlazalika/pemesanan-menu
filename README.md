# Pemesanan Menu (Laravel)

Aplikasi pemesanan menu berbasis Laravel untuk kebutuhan restoran/kafe.

## Fitur Utama
- Register & Login Pelanggan
- Katalog Menu
- Keranjang & Checkout
- Upload Bukti Pembayaran
- Tracking Order (Invoice)
- Admin Panel (Kelola Produk, User, Meja, Penjualan, Pembayaran)

## Cara Instalasi
1. Clone repository ini
2. Jalankan `composer install`
3. Copy `.env.example` menjadi `.env` dan atur konfigurasi database
4. Jalankan `php artisan key:generate`
5. Jalankan migrasi database: `php artisan migrate`
6. (Opsional) Jalankan seeder: `php artisan db:seed`
7. Jalankan server lokal: `php artisan serve`

## Struktur Folder Penting
- `app/Http/Controllers` : Controller aplikasi
- `app/Models` : Model Eloquent
- `resources/views` : Blade template (frontend)
- `routes/web.php` : Routing utama aplikasi

## Kebutuhan
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & npm (untuk asset frontend)

---

Aplikasi ini dikembangkan menggunakan Laravel, silakan sesuaikan instruksi dengan kebutuhan project Anda.

