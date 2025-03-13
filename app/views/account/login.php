<?php use app\core\Flasher as Flasher;?>
<head>
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang yang lembut */
        }
        .container {
            margin-top: 100px; /* Margin atas */
            max-width: 400px; /* Lebar maksimum untuk form */
        }
        .btn-primary {
            background-color: #e63946; /* Warna tombol */
            border: none; /* Menghilangkan border default */
        }
        .btn-primary:hover {
            background-color: #d62839; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Login</h2>
        <div class="col-6">
            <?php Flasher::flash()?>
        </div>
        <form action="<?= BASEURL; ?>/Login/authenticate" method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
    <p class="text-center mt-3">Don't have an account? <a href="<?= BASEURL; ?>/Register">Register here</a></p>
</form>
    </div>
</body>