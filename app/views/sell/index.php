<?php use app\core\Flasher as Flasher;?>
    <title>Sell Items</title>
    <style>
        .container {
            margin-top: 50px; /* Margin atas */
        }
        .btn-primary {
            background-color: #e63946; /* Merah hati */
            border: 2px solid #e63946; /* Border merah hati */
        }
        .btn-primary:hover {
            background-color: #ffffff; /* Warna leci (putih) */
            color: #e63946; /* Teks merah hati */
            border: 2px solid #e63946; /* Border merah hati */
        }
    </style>
    <div class="container">
        <h2 class="text-center">My Products</h2>

        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addProductModal">
            Add New Product
        </button>
        <div class="col-6">
                    <?php Flasher::flash()?>
        </div>

        <!-- Product List -->
        <div class="list-group">
            <!-- Example Product Item -->
            <?php foreach($data['products'] as $product) : ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5><?= $product['product_name'] ?></h5>
                    <p>Price: <?= $product['product_price']?></p>
                    <p>Status: <?= $product['status']?></p>
                    <p>Category: <?= $product['category_name']?></p>
                    <p>Description: <?= $product['description']?></p>
                </div>
                <div>
                    <button class="btn btn-danger btn-sm"><a href="<?= BASEURL; ?>/Sell/delete/<?= $product['product_id'] ?>">Delete</a></button>
                </div>
            </div>
            <br>
            <?php endforeach; ?>
            <!-- Repeat for other products -->
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
                        <input type="hidden" name="id_user" value="<?= $_SESSION['user_id']; ?>"> <!-- Default user ID from session -->
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
                            <input type="file" class="form-control-file" id ="productImage" name="image" accept="image/*" value="NULL">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>