<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul'] ?></title>
    <link href=" <?= BASEURL ;?> /css/button-mandiri.css" rel="stylesheet">
    <link href=" <?= BASEURL ;?> /css/bootstrap.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ;?>/img/icon.png">
    <style>
    
    body {
        background-color: wheat;
    }

    *:not(input, textarea) {
    -webkit-user-select: none;
}

    .navbar {
        background-color: #e63946 !important; /* Warna yang sama dengan footer */
    }

    .navbar .nav-link,
    .navbar .navbar-brand,
    .navbar {
        color: #f4f4f4 !important; /* Warna teks agar kontras */
    }

    .navbar .nav-link:hover,
    .navbar:hover {
        color: black !important;
    }

    .navbar-toggler {
        border-color: #f4f4f4;
    }
    
    .dropdown-menu {
        background-color: #f4f4f4; 
        color: black;
    }

    footer {
        background-color: #e63946; /* Mengubah warna footer menjadi merah hati */
        color: #f4f4f4;
        padding: 50px;
        text-align: left;
        font-size: 14px;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        padding: 0 40px;
        margin-bottom: 40px;
        margin-top: 30px;
    }

    .footer-left { 
        display: flex;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    } 

    .footer-right {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .footer-logo {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .footer-nav {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .footer-nav a {
        color: white;
        text-decoration: none;
    }

    .social-media {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .social-media p {
        margin-right: 10px;
    }

    .social-media a img {
        width: 25px;
        height: 25px;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.5);
        padding: 20px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .footer-policy {
        display: flex;
        gap: 20px;
    }

    .footer-policy a {
        color: white;
        text-decoration: none;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-warning sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL ?>/#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL ?>/Market">Shopping</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL ?>/Sell">Sell</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= BASEURL ?>/Profile">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <?php if (isset($_SESSION['login']) || isset($_COOKIE['login'])) : ?>
            <li><a class="dropdown-item" href="<?= BASEURL ?>/Logout">Logout</a></li>
            <?php else :?>
            <li><a class="dropdown-item" href="<?= BASEURL ?>/Login">Login</a></li>
            <?php endif; ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL ?>/about">About</a>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>