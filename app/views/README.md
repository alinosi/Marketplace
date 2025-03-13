Di dalam folder views akan ada folder-folder lain, folder-folder ini berfungsi untuk menyimpan kumpulan views sesuai controller.

Jadi missal saya membuat folder home di dalam views, itu berarti Ketika ada controller Bernama home dan controller tersebut melakukan proses maka hasil proses tersebut akan disimpan di dalam folder views home dan views akan menampilkannya, tergantung dengan method apa yang digunakan, jadi di dalam folder views/home akan ada beberapa file tergantung dengan jumlah hasil visual yang akan kita buat dan hasil itu berasal dari controllernya

Penjelasan spesifik:

3. **Folder View untuk Setiap Controller**: 
   - **Penamaan**: Setiap controller biasanya memiliki folder sendiri di dalam direktori `views` yang sesuai dengan nama controller tersebut. Jadi, jika ada controller `Home`, maka akan ada folder `home` di dalam `views`.
   - **File View**: Di dalam folder `home`, terdapat file-file view yang mewakili tampilan untuk setiap metode (method) dalam controller `Home`. Misalnya, jika controller `Home` memiliki metode `index`, `about`, `contact`, dan lainnya, maka mungkin ada file `index.php`, `about.php`, `contact.php`, dll., di dalam folder `views/home`. Setiap file ini bertanggung jawab untuk menampilkan antarmuka yang sesuai dengan metode yang dipanggil.

Contoh konkret:
- Misalkan controller `Home` memiliki metode `index`, `about`, `services`, `contact`, dan `faq`. Maka, di dalam folder `views/home`, Anda mungkin akan menemukan file-file seperti:
  - `index.php`
  - `about.php`
  - `services.php`
  - `contact.php`
  - `faq.php`

Ketika pengguna mengakses rute yang sesuai (misalnya `/home/about`), controller `Home` akan menjalankan metode `about`, memproses logika yang diperlukan (seperti mengambil data dari model), dan kemudian mengarahkan hasilnya ke file view `about.php` di folder `views/home`.

Dengan cara ini, struktur folder dan file dalam aplikasi yang menggunakan MVC menjadi lebih terorganisir, memudahkan dalam pengelolaan kode dan pemisahan antara logika bisnis (controller) dan tampilan (view).