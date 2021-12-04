BOOKING COURT adalah aplikasi untuk membooking tempat olahraga

terdapat 5 akun
1. Admin: email = admin@admin.com, password = admin
2. Management: email = nando@management.com, password = nando
3. user:
    - email = kevin@user.com, password = kevin
    - email = nina@user.com,  password = nina
    - email = john@user.com, password = john

Konfigurasi pertama:
1. Download code dari github, kemudian masukan ke directory yang diinginkan.
2. setelah itu buat sebuah database dengan nama book_hotel
3. kemudian silahkan ke terminal directory project laravelnya
- pada terminal / cmd silahkan masukan command: composer update(untuk update terlebih dahulu beberapa libraries / helpers baru)
- setelah itu masukan command: php artisan migrate(jika belum pernah melakukan migrate di project ini)
php artisan migrate: fresh(untuk yang sudah pernah melakukan migrate di project ini)
Migrate untuk membuat struktur databasenya
- setelah itu masukan command: php artisan db: seed(untuk memasukan data dummy yang telah kami sediakan di laravel)
- setelah itu jalankan perintah php artisan serve untuk menjalakan project laravel

untuk membuka project : silahkan masukan di url webnya : 127.0.0.1:8000 / localhost:8000

Selamat mencoba dan menilai

Terima kasih.