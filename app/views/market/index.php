<?php use app\core\Flasher as Flasher;?>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }

        .filter-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 30px;
        }

        .filter-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        .filter-select {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 15px;
            width: 100%;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-body {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #ff4500;
            margin-bottom: 8px;
        }

        .product-status {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 15px;
        }

        .status-badge {
            background-color: #111;
            color: white;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-block;
        }

        .btn-details {
            background-color: #111;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 15px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: auto;
            text-align: center;
            width: 100%;
        }

        .btn-details:hover {
            background-color: #333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Modal Styling */
        .modal-content {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background-color: #111;
            color: white;
            border-radius: 16px 16px 0 0;
            padding: 15px 20px;
        }

        .modal-title {
            font-weight: 600;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid #eee;
            padding: 15px 20px;
        }

        .btn-close {
            background-color: #e0e0e0;
            color: #333;
            border: none;
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-order {
            background-color: #111;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-close:hover, .btn-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-order:hover {
            background-color: #333;
        }

        .product-detail-label {
            font-weight: 600;
            margin-right: 5px;
        }

        .product-detail-row {
            margin-bottom: 10px;
        }

        .close {
            color: white;
            opacity: 0.8;
        }

        .close:hover {
            color: white;
            opacity: 1;
        }

        /* Alert/Flash message styling */
        .alert {
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        /* Cart badge */
        .cart-badge {
            background-color: #ff4500;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            margin-left: 5px;
        }

        /* Making cards equal height */
        .product-grid > .col-md-4 {
            display: flex;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .product-grid > .col-md-4 {
                margin-bottom: 20px;
            }
        }
    </style>

<body>
    <!-- Main Content -->
    <div class="container">
        <h1 class="page-title">Marketplace</h1>

        <!-- Filter Section -->
        <div class="filter-container">
            <h5 class="filter-title">Filter</h5>
            <select class="filter-select" id="categoryFilter">
                <option value="" disabled selected>Select Category</option>
                <option value="All" selected>All</option>
                <option value="Electronics">Electronic</option>
                <option value="Sports">Sports</option>
                <option value="Clothes">Clothes</option>
            </select>
        </div>

        <!-- Flash Messages -->
        <?php Flasher::flash()?>

        <!-- Products Grid -->
        <div class="row product-grid">
            <?php foreach ($data['items'] as $index => $item) : ?>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="<?= BASEURL . "/img/" . $item['Image'] ?>" class="product-img" alt="<?= $item['Product_Name'] ?>">
                    <div class="product-body">
                        <h5 class="product-title"><?= $item['Product_Name'] ?></h5>
                        <p class="product-price"><?= "Rp " . number_format($item['Price'], 0, ',', '.') ?></p>
                        <p class="product-status">
                            <span class="status-badge"><?= $item['Status'] ?></span>
                        </p>
                        <b><?= $item['Category'] ?></b>
                        <button class="btn-details" data-toggle="modal" data-target="#productDetails<?= $index ?>">
                            <i class="fas fa-info-circle mr-1"></i> Product Details
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Product Modals -->
        <?php foreach ($data['items'] as $index => $item) : ?>
        <div class="modal fade" id="productDetails<?= $index ?>" tabindex="-1" role="dialog" aria-labelledby="productDetailsLabel<?= $index ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productDetailsLabel<?= $index ?>">Product Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="product-detail-row">
                            <span class="product-detail-label">Name:</span> <?= $item['Product_Name'] ?>
                        </div>
                        <div class="product-detail-row">
                            <span class="product-detail-label">Price:</span> <?= "Rp " . number_format($item['Price'], 0, ',', '.') ?>
                        </div>
                        <div class="product-detail-row">
                            <span class="product-detail-label">Store Address:</span> <?= $item['Owner_Address'] ?>
                        </div>
                        <div class="product-detail-row">
                            <span class="product-detail-label">Seller:</span> <?= $item['Owner_Product'] ?>
                        </div>
                        <div class="product-detail-row">
                            <span class="product-detail-label">Status:</span> <?= $item['Status'] ?>
                        </div>
                        <div class="product-detail-row">
                            <span class="product-detail-label">Description:</span> <br>
                            <?= $item['Description'] ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn-close" data-dismiss="modal"></button> -->
                        <button type="button" class="btn-order nonorderButton" 
                            onclick="window.location.href='<?= BASEURL; ?>/Market/productOrder/<?= $item['Product_id'] . '/' . $item['Price']; ?>';">
                            <i class="fas fa-shopping-cart mr-1"></i> Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
          const filterSelect = document.getElementById('categoryFilter');
        
          filterSelect.addEventListener('change', function() {
            const selectedCategory = this.value; // misal "All", "elektronik", dsb.
            const productCols = document.querySelectorAll('.product-grid .col-md-4');
        
            // Jika pilih "All", tampilkan semua dan hentikan lebih lanjut
            if (selectedCategory === 'All') {
              productCols.forEach(col => col.style.display = '');
              return;
            }
        
            // Selain itu, filter per-item
            productCols.forEach(col => {
              const categoryText = col
                .querySelector('b')
                .textContent
                .trim()
                .toLowerCase();
            
              if (categoryText === selectedCategory.toLowerCase()) {
                col.style.display = '';
              } else {
                col.style.display = 'none';
              }
            });
          });
        });
    </script>