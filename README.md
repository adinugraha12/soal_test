Langkah Instalasi Aplikasi

Ikuti langkah-langkah berikut secara berurutan. Jalankan setiap perintah di terminal/command prompt pada direktori proyek.

1. Clone Repository
https://github.com/adinugraha12/soal_test.git

buka forder dengan perintah

cd soal_test

2. Instal Dependensi PHP

Gunakan Composer untuk menginstal semua paket Laravel dan dependensi yang diperlukan:

composer install

3. Import Database

Import file database soal_test.sql ke dalam MySQL menggunakan XAMPP atau Laragon.

Pastikan nama database yang dibuat di phpMyAdmin adalah soal_test sebelum melakukan import.

4. Jalankan Server Development

Jalankan perintah berikut untuk memulai server Laravel:

php artisan serve

Aplikasi akan berjalan di:
http://127.0.0.1:8000

5. Cara Login

Admin   : admin@gmail.com   password  :123456
Manager : manager@gmail.com password  :123456
=