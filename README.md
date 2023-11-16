# Anime_Ku-V2

Website ini adalah sebuah web yang dimana dia website seperti webs restoran simpe dengan menggunakan CRUD
yang dimana dia dalam weeb tersebut sudah tersedia 2 role admin dan user dengan yang akan datang role suplayer
dengan fitur yang memadai

## Fitur

-   create food promo {admin} 
-   Create Food {admin} 
-   Comman To Google Sheet (untuk ini link Google Sheet nya bisa di ganti sesuai kalian 'resources/views/landing_pages/header_menu/about.blade.php' )  

## Jalankan Secara Lokal

-   Pastikan sudah terinstall php 8.2.4 untuk menjalankan laravel 10

**Clone**

```shell
git clone https://github.com/Bayu-Sumantri/DadFood.git
```

**Go to Directory**

```shell
cd BudheFood
```

**Go to Directory Git Bash**

```shell
code .
```


**Setting Database Config in Env**

```
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

**Migrate Database**


**Link Storage**

```shell
php artisan storage:link
cp .env.example .env
```

**Run Local Server**

```shell
php artisan serve
```

## Environment Variables

jika sudah uppload foto tetapi foto nya tidak muncul atau tidak nampil bisa dengan merubah dan mengkonfigurasi file .env , dan ganti dengan url yang kita jalan kan pada project ini 

contoh: `http://127.0.0.1:8000`

```
APP_URL
```

## Developer

-   [Banh_Code](https://github.com/Bayu-Sumantri)
