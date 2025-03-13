<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Produk</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom{
            background-color: #e63946; /* Merah hati */
            border-radius: 10px;
            font-size: 16px;
            /* border: 1px solid transparent; */
            width: 200px;
            display: inline-block;
            text-decoration: none;
            padding: 3px;
            color: white;
            border: 2px solid #e63946; /* Border merah hati */
            transition: background-color 0.3s, color 0.3s; /* Transisi untuk hover */
        }
        .btn-custom:hover {
            background-color: #ffffff; /* Warna leci (putih) */
            color: #e63946; /* Teks merah hati */
            border: 2px solid #e63946; /* Border merah hati */
        }
    </style>
</head>
<body>
<div class="container text-center">
    <img src="<?= BASEURL ;?>/img/logo.png" alt="Barber Image" class="img-fluid rounded mb-4" width="300px">
    <h1 class="display-4" style="color: #333;">Selamat datang di BARBER</h1>
        <p class="lead" style="color: #666;">
            <!-- Isi penjelasan mengenai barber di sini -->
            Ini adalah tempat di mana Anda dapat menemukan dan menjual barang-barang bekas dengan mudah, cepat, dan efesien.
        </p>
        
        <!-- Tombol -->
        <div class="mt-4">
            <a href="<?= BASEURL ?>/Market" class="btn btn-custom mr-2">Beli Barang</a>
            <a href="<?= BASEURL; ?>/Sell" class="btn btn-custom">Jual Barang</a>
        </div>
</div>
</body>
</html>