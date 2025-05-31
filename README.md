<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

- Sistem login cukup satu form. Saat user login:
  - Jika username berupa **NIM mahasiswa**, akan diarahkan ke dashboard mahasiswa.
  - Jika username terdeteksi sebagai admin, akan diarahkan ke dashboard admin.
- Sistem login menggunakan **session**, jadi kalau tidak aktif beberapa waktu, session akan habis dan user otomatis logout.
- Logout dilakukan dengan **hapus session secara manual** saat tombol logout diklik.
- Semua halaman dashboard dilindungi menggunakan auth agar **tidak bisa diakses sebelum login**.

---

## Fitur untuk Mahasiswa

- Mahasiswa wajib **daftar dan login** (username = NIM).
- Bisa langsung **pesan shuttle** di menu Shuttle Booking.
- Di form booking:
  - Informasi user (username, nama lengkap, nomor HP) otomatis terisi dan tidak bisa diubah.
  - Mahasiswa hanya perlu isi **tanggal, jam, dan rute**.
- Setelah berhasil pesan, muncul **alert notifikasi sukses**.

---

## Fitur untuk Admin

- lihat semua booking dari mahasiswa.
- Edit booking mahasiswa.
- Delete booking mahasiswa.

- Tambah akun admin baru.
- Lihat semua akun admin.
- Edit data admin.
- Hapus akun admin.

- Semua data ditampilkan dalam bentuk **tabel**.

---

## Struktur Database

### Table: `users`

| Kolom      | Tipe Data                |
| ---------- | ------------------------ |
| id         | BIGINT (PK)              |
| name       | VARCHAR                  |
| username   | VARCHAR                  |
| no_hp      | VARCHAR                  |
| role       | ENUM (admin/mahasiswa)   |
| email      | VARCHAR                  |
| password   | VARCHAR                  |
| timestamps | CREATED_AT, UPDATED_AT   |

### Table: `shuttle_bookings`

| Kolom      | Tipe Data                |
| ---------- | ------------------------ |
| id         | BIGINT (PK)              |
| user_id    | BIGINT (FK ke users.id)  |
| route      | VARCHAR                  |
| date       | DATE                     |
| hour       | VARCHAR                  |
| timestamps | CREATED_AT, UPDATED_AT   |

kolom user_id di table shuttle bookings merupakan foreign key dari kolom ID dari table users supaya tau user mana yang melakukan booking

---

# Cara Menjalankan Project

---

### 1. Install Software

Pastikan sudah menginstall:

* [XAMPP](https://www.apachefriends.org/index.html) (Apache + MySQL)
* [Composer](https://getcomposer.org/)
* [Git](https://git-scm.com/)

---

## Clone Project dari GitHub

1. Buka **CMD / Terminal** dan arahkan ke folder tempat kamu mau menyimpan project.
2. Jalankan perintah berikut:

```bash
git clone https://github.com/ValenciaJocelyn/SE_AoLProject
cd project-databasedesign
```

---

## Setup Laravel

1. Install dependency Laravel:

```bash
composer install
```

2. Copy file konfigurasi:

```bash
copy .env.example .env
```

3. Generate application key:

```bash
php artisan key:generate
```

---

## Setup Database lewat phpMyAdmin

1. Jalankan **XAMPP**, aktifkan **Apache** dan **MySQL**.
2. Buka browser dan akses: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
3. Klik tab **"Database"** di bagian atas.
4. Buat database baru dengan nama:

```
shuttle_app
```

Klik **Create**.

---

## Konfigurasi File `.env`

1. Buka project menggunakan **Visual Studio Code**.
2. Cari dan buka file `.env`, lalu ubah bagian database menjadi:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shuttle_app
DB_USERNAME=root
DB_PASSWORD=
```

> ⚠️ Default username untuk XAMPP adalah `root`, dan password biasanya **kosong** (tidak diisi).

---

## Jalankan Migration & Seeder

1. Jalankan migrasi database:

```bash
php artisan migrate
```

2. Jalankan seeder untuk mendapatkan akun admin diawal:

```bash
php artisan db:seed --class=AdminUserSeeder
```
```bash
php artisan db:seed --class=StudentUserSeeder
```
Ini akan membuat akun admin dengan rincian: <br>
Username: admin <br>
Password: admin123

---

## Jalankan Aplikasi

Jalankan server Laravel:

```bash
php artisan serve
```

Akses aplikasi di browser:

```
http://localhost:8000/
```

---

## ✅ Selesai!
=======
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
