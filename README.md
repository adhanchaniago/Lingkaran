<p align="center">
    <img src="https://github.com/riyan-amanda/lingkaran-web-news/blob/master/public/assets/logo/lingkaran.png?raw=true" alt="Lingkaran Web News" width="350px" height="100px">
    <hr/>
</p>

## Tentang Lingkaran

Lingkaran adalah website untuk memberikan berita-berita terbaru yang ada di Indonesia. Website ini dibangun menggunakan Framework Laravel dan terdapat beberapa package untuk mendukung jalannya website ini. List package yang terdapat pada website lingkaran dapat dilihat pada link dibawah.

List package Website Lingkaran, diantaranya adalah:

- Framework [Laravel](https://laravel.com/) v7.
- Design website menggunakan Framework [Bootstrap](https://getbootstrap.com/) v4.5.
- Template CMS menggunakan [Admin Bootstrap Gentelella](https://github.com/ColorlibHQ/gentelella).
- Hak akses dan Level User menggunakan [Spatie Laravel Permission](https://github.com/spatie/laravel-permission).
- Manipulasi gambar pada website menggunakan [Image Intervension](http://image.intervention.io/).

### Instalasi
Instal [Composer](https://getcomposer.org/) pada Sistem Operasi agar command artisan dapat dijalankan. Ketik perintah update pada terminal untuk download vendor yang dibutuhkan.

```javascript
//Download vendor untuk aplikasi
composer update
```

Jalankan artisan command untuk generate key baru. Key dapat dilihat pada file ".env", jika file tidak ada rename file ".env.example" menjadi ".env".

```javascript
//Generate key baru
php artisan key:generate
```
Jalankan artisan migration dan seeder pada terminal untuk membuat database dan default user.

```javascript
//Generate database baru dan user default
php artisan migrate --seed

```

### User Default Akses

```javascript
//Email login
superadmin@email.com

//Pass login
12345678
```

<hr/>
<p align="center">NOTE: Website ini masih belum selesai dan masih dalam pengembangan. 2020</p>
