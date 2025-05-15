    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        /* 2. Gambar banner dengan margin dan sudut bulat */
        .banner-container {
            margin: 2rem 5%;
        }
        
        .banner-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 16px; /* Sudut sedikit melingkar */
        }
        
        /* 3. 2 Button utama dengan text */
        .main-buttons {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin: 3rem 0;
        }
        
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .main-button {
            background-color: #000;
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 12px; /* Sudut sedikit melingkar */
            cursor: pointer;
            transition: background-color 0.3s;
            width: 180px;
        }
        
        .main-button:hover {
            background-color: #e63900;
        }
        
        .button-text {
            margin-top: 0.8rem;
            max-width: 200px;
            color: #333;
        }
        
        /* 4. 3 cart produk unggulan */
        .featured-products {
            padding: 2rem 5%;
        }
        
        .section-title {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }
        
        .product-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        
        .product-card {
            background-color: white;
            border-radius: 16px; /* Sudut tidak siku-siku */
            overflow: hidden;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .product-info {
            padding: 1.5rem;
        }
        
        .product-title {
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }
        
        .product-price {
            color: #ff4500;
            font-weight: bold;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        
        .add-to-cart {
            background-color: #000;
            color: white;
            border: none;
            padding: 0.7rem 1rem;
            border-radius: 8px; /* Sudut sedikit melingkar */
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        
        .add-to-cart:hover {
            background-color: #333;
        }
        
        /* 5. Exclusive content */
        .exclusive-content {
            background-color: #222;
            color: white;
            padding: 3rem 5%;
            margin: 3rem 5%;
            border-radius: 20px; /* Sudut sedikit melingkar */
            text-align: center;
        }
        
        .exclusive-title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .exclusive-description {
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }
        
        .subscription-options {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        
        .subscription-plan {
            background-color: #333;
            padding: 1.5rem;
            border-radius: 12px; /* Sudut sedikit melingkar */
            width: 250px;
        }
        
        .plan-name {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .plan-price {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #ff4500;
        }
        
        .plan-features {
            list-style: none;
            margin-bottom: 1.5rem;
            text-align: left;
        }
        
        .plan-features li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem;
        }
        
        .plan-features li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #ff4500;
        }
        
        .subscribe-button {
            background-color: #ff4500;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px; /* Sudut sedikit melingkar */
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .subscribe-button:hover {
            background-color: #e63900;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .main-buttons {
                flex-direction: column;
                align-items: center;
                gap: 2rem;
            }
            
            .banner-image {
                height: 250px;
            }
            
            .exclusive-content {
                padding: 2rem 1rem;
            }
        }
    </style>
<body>    
    <!-- 2. Gambar Banner -->
    <div class="banner-container">
        <img src="<?= BASEURL; ?>/img/BARB.png" alt="Banner Promo" class="banner-image">
    </div>
    
    <!-- 3. 2 Button Utama -->
    <div class="main-buttons">
        <div class="button-container">
            <a href="<?= BASEURL; ?>/Market"><button class="main-button">Market</button></a>
            <p class="button-text">Temukan ribuan produk dengan harga terbaik</p>
        </div>
        <div class="button-container">
            <a href="<?= BASEURL; ?>/Sell"><button class="main-button">Sell</button></a>   
            <p class="button-text">Ubah sampah menjadi uang</p>
        </div>
    </div>
    
    <!-- 4. 3 Cart Produk Unggulan -->
    <section class="featured-products">
        <h2 class="section-title">Featured Product</h2>
        <div class="product-container">
            <?php foreach($data['items'] as $item) : ?>
                <div class="product-card">
                    <img src="<?= BASEURL . "/img/" . $item['image'] ?>" alt="<?= $item['product_name'] ?>" class="product-image">
                    <div class="product-info">
                        <h3 class="product-title"><?= $item['product_name'] ?></h3>
                        <p class="product-price"><?= "Rp. " . number_format($item['product_price'], 0, ',', '.') ?></p>
                        <a href="<?= BASEURL; ?>/Market/productOrder/<?= $item['product_id'] . '/' . $item['product_price']; ?>"><button class="add-to-cart">Add to cart</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <!-- 5. Exclusive Content -->
    <section class="exclusive-content">
        <h2 class="exclusive-title">Get an Exclusive Access</h2>
        <p class="exclusive-description">Bergabunglah dengan program keanggotaan kami untuk mendapatkan akses ke penawaran eksklusif, diskon spesial, dan pengiriman gratis setiap bulan.</p>
        
        <div class="subscription-options">
            <div class="subscription-plan">
                <h3 class="plan-name">Basic</h3>
                <p class="plan-price">Rp 49.000/bln</p>
                <ul class="plan-features">
                    <li>Diskon 5% untuk semua produk</li>
                    <li>Akses prioritas ke flash sale</li>
                    <li>Pengiriman gratis (min. Rp 200rb)</li>
                </ul>
                <button class="subscribe-button">Subscribe</button>
            </div>
            
            <div class="subscription-plan">
                <h3 class="plan-name">Premium</h3>
                <p class="plan-price">Rp 129.000/bln</p>
                <ul class="plan-features">
                    <li>Diskon 15% untuk semua produk</li>
                    <li>Akses prioritas ke flash sale</li>
                    <li>Pengiriman gratis tanpa minimum</li>
                    <li>Cashback 5% dalam bentuk poin</li>
                    <li>Akses ke produk pre-launch</li>
                </ul>
                <button class="subscribe-button">Subscribe</button>
            </div>
        </div>
    </section>
    <script>
      document
        .querySelectorAll('.subscribe-button')
        .forEach(btn =>
          btn.addEventListener('click', () => alert('berhasil'))
        );
    </script>
    
    <!-- 6. Footer -->
<!-- letakkan ini sebelum penutup </body> -->
