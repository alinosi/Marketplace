FILE PUBLIC
-menyimpan file-file yang bisa di akses user, seperti index,css, dan js


File htaccess
Options -Multiviews

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?url=$1 [L]

CARA KERJA :

Misalkan pengguna mengakses URL http://example.com/product/view/123.

1. Options -Multiviews: MultiViews dimatikan, jadi Apache tidak akan mencoba menemukan file yang sesuai dengan product/view/123 berdasarkan ekstensi file atau bahasa.

2. RewriteEngine On: mod_rewrite diaktifkan.

3. RewriteCond %{REQUEST_FILENAME} !-d: Kondisi ini akan memeriksa apakah product/view/123 bukan direktori. Jika product/view/123 bukan direktori, maka lanjut ke kondisi berikutnya.

4. RewriteCond %{REQUEST_FILENAME} !-f: Kondisi ini akan memeriksa apakah product/view/123 bukan file. Jika product/view/123 bukan file, maka lanjut ke aturan penulisan ulang.

5. RewriteRule ^(.*)$ index.php?url=$1 [L]: Karena kedua kondisi sebelumnya terpenuhi (bukan file atau direktori), permintaan akan diarahkan ke index.php dengan query string url=product/view/123.

Sehingga, http://example.com/product/view/123 akan secara internal diproses sebagai http://example.com/index.php?url=product/view/123.

Kode di atas sangat umum digunakan dalam aplikasi berbasis PHP dengan arsitektur MVC (Model-View-Controller), di mana semua permintaan diarahkan ke satu titik masuk (seperti index.php) yang kemudian mengarahkan permintaan ke controller dan metode yang tepat berdasarkan URL.