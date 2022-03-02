<p align="center"><a href="https://github.com/saikocode/forumly" target="_blank"><img src="public/img/logo/logo.svg" width="400"></a></p>


## Tentang Forumly


Forumly adalah forum online berbasis web yang ditujukan untuk para mahasiswa sebagai sarana untuk berdiskusi dan bertukar pikiran. Forumly juga memudahkan para mahasiswa untuk berbagi ilmu dan pengalaman. Aplikasi ini dibuat sebagai salah satu tugas besar untuk memenuhi nilai UAS mata kuliah Rekayasa Perangkat Lunak II.
Pada aplikasi forumly ini terdapat fitur :
- Login
- Register
- Membuat diskusi
- Mengelola postingan (menyunting dan menghapus)
- Menyukai diskusi
- Berlangganan dengan suatu topik diskusi
- Membuat komentar
- Mengikuti akun user lain
- Mencari topik diskusi
- Mengatur profil pribadi
- Menyediakan fitur khusus untuk admin berupa membuat kategori, melihat user active, dan mengelola seluruh threads user



### Dibuat Dengan


* [Laravel](https://laravel.com)
* [Tailwind](https://getbootstrap.com)
* [AlpineJS](https://alpinejs.dev/)
* [Jetstream](https://jetstream.laravel.com/2.x/introduction.html)


<a href="https://cdnlogo.com/logo/laravel_40397.html"><img src="https://cdn.cdnlogo.com/logos/l/23/laravel.svg" width="100" height="100"></a>
<a href="https://cdnlogo.com/logo/tailwindcss_42966.html"><img src="https://cdn.cdnlogo.com/logos/t/58/tailwindcss.svg" width="100" height="100"></a>
<a href="https://laravelnews.imgix.net/images/jetstream.png?ixlib=php-3.3.1"><img src="https://laravelnews.imgix.net/images/jetstream.png?ixlib=php-3.3.1" width="200" height="100"></a>



### Instalasi



1. Clone repo
   ```sh
   git clone https://github.com/saikocode/forumly.git
   ```
2. Install Laravel
   ```sh
   composer install
   ```
3. Copy file `.env.example` lalu ubah menjadi `.env` buka lalu ubah
   ```sh
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=forumly
      DB_USERNAME=root
      DB_PASSWORD=';
   ```
4. Buka terminal lalu jalankan perintah ini untuk melakukan key generate
   ```sh
   php artisan key:generate
   ```
5. Import database
   ```sh
   php artisan migrate:fresh --seed
   ```
5. Jalankan server
   ```sh
   php artisan serve
   ```
## Anggota IF3_TimTahuBulat
10119091 - Muhammad Rojabi Nur Fauzi</br>
10119097 - Ikhsan Nurul Rizki</br>
10119118 - Rizky Septiana Abdul Razak</br>
10119120 - Reichan Muhamad Maulana</br>
10119123 - Angga Cahya Abadi</br>
10119124 - Primarazaq Noorsalih Putra Hilmana


## License

Forumly is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
