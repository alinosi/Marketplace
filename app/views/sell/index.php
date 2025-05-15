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

        .btn-add-product {
            background-color: #111;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-bottom: 25px;
            display: inline-flex;
            align-items: center;
            width: 200px;
            justify-content: center;
        }

        .btn-add-product i {
            margin-right: 8px;
        }

        .btn-add-product:hover {
            background-color: #333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
            overflow: hidden;
            display: flex;
            height: 100%;
            width: 100%; /* Full width */
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .product-img-container {
            width: 180px;
            min-width: 180px;
            height: 180px;
            overflow: hidden;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-placeholder-img {
            width: 100%;
            height: 100%;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-size: 0.9rem;
        }

        .product-body {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
            width: 100%;
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
            margin-bottom: 8px;
        }

        .status-badge {
            background-color: #111;
            color: white;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-block;
        }

        .category-badge {
            background-color: #f0f0f0;
            color: #666;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 10px;
        }

        .product-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .btn-delete {
            background-color: #ff4500;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 8px 15px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete:hover {
            background-color: #e63946;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .actions-container {
            margin-top: auto;
            text-align: right;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            width: 100%;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }

        .form-control-file {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 15px;
            width: 100%;
            font-size: 0.95rem;
            color: #333;
        }

        .btn-modal-close {
            background-color: #e0e0e0;
            color: #333;
            border: none;
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-modal-submit {
            background-color: #111;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-modal-close:hover, .btn-modal-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-modal-submit:hover {
            background-color: #333;
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

        .alert-danger {
            background-color: #ffebee;
            color: #c62828;
        }

        .product-grid {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        /* Making product cards equal height and width */
        .product-grid > .col-md-12 {
            display: flex;
            margin-bottom: 30px;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .product-card {
                flex-direction: column;
                width: 100%;
            }
            
            .product-img-container {
                width: 100%;
                height: 200px;
            }
            
            .product-header {
                flex-direction: column;
            }
            
            .product-header > div {
                width: 100% !important;
            }
            
            .actions-container {
                margin-top: 15px;
                text-align: left;
                justify-content: flex-start !important;
            }
            
            .btn-delete {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="container">
        <h1 class="page-title">My Products</h1>

        <!-- Add New Product Button -->
        <button type="button" class="btn-add-product" data-toggle="modal" data-target="#addProductModal">
            <i class="fas fa-plus-circle"></i> Add New Product
        </button>

        <!-- Flash Messages -->
        <div class="col-12">
            <?php Flasher::flash()?>
        </div>

        <!-- Products Grid -->
        <div class="row product-grid">
            <?php foreach($data['products'] as $product) : ?>
            <div class="col-md-12" style="width: 100%;">
                <div class="product-card">
                    <div class="product-img-container">
                        <img src="<?= BASEURL . '/img/' . $product['image'] ?>" class="product-img" alt="<?= $product['product_name'] ?>">
                    </div>
                    <div class="product-body">
                        <div class="product-header">
                            <div style="width: 70%;">
                                <h5 class="product-title"><?= $product['product_name'] ?></h5>
                                <p class="product-price"><?= "Rp " . number_format($product['product_price'], 0, ',', '.') ?></p>
                                <p class="product-status">
                                    <span class="status-badge"><?= $product['status'] ?></span>
                                </p>
                                <span class="category-badge"><?= $product['category_name'] ?></span>
                            </div>
                            <div class="actions-container" style="width: 30%; display: flex; justify-content: flex-end;">
                                <a href="<?= BASEURL; ?>/Sell/delete/<?= $product['product_id'] ?>" class="btn-delete">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </div>
                        </div>
                        <p class="product-description"><?= $product['description'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal for Adding New Product -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= BASEURL;?>/Sell/add" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['user_id']; ?>">
                        <div class="form-group">
                            <label for="productName">Item Name</label>
                            <input type="text" class="form-control" id="productName" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Item Category</label>
                            <select class="form-control" id="productCategory" name="product_category" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="C001">Electronic</option>
                                <option value="C002">Books</option>
                                <option value="C003">Clothings</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Item Price</label>
                            <input type="number" class="form-control" id="productPrice" name="product_price" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Product Description</label>
                            <textarea class="form-control" id="productDescription" name="product_description" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="productImage">Item Image</label>
                            <input type="file" class="form-control-file" id="productImage" name="image" required>
                            <small class="form-text text-muted">Upload a clear image of your product</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-modal-close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn-modal-submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Make sure Font Awesome is included in your template -->
    <script>
        // If your image uploads aren't working, you might need to check:
        // 1. File upload permissions on server
        // 2. Max file size settings
        // 3. Correct enctype on form (multipart/form-data)
        
        // Optional: Preview image before upload
        document.getElementById('productImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create a preview if needed
                    console.log('Image loaded:', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>