<?php use app\core\Flasher as Flasher;?>
<style>
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card img {
            border-radius: 10px 10px 0 0;
        }
        .btn-primary {
            background-color: #e63946;
            border: none;
        }
        .btn-primary:hover {
            background-color: #d62839;
        }
        .filter {
            margin-bottom: 30px;
        }
    </style>
    <div class="container">
        <h2 class="text-center">Marketplace</h2>
        <div class="filter">
            <h5>Filter</h5>
            <select class="form-control" id="categoryFilter">
                <option value="" disabled selected>Select Category</option>
                <option value="elektronik">Electronics</option>
                <option value="olahraga">Sports</option>
            </select>
        </div>
        <?php Flasher::flash()?>
        <div class="row">
            <div class="row">
    <?php foreach ($data['items'] as $index => $item) : ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?= $item['image'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $item['Product_Name'] ?></h5>
                    <p class="card-text">Price: <?= $item['Price'] ?></p>
                    <p class="card-text">Status: <?= $item['Status'] ?></p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#productDetails<?= $index ?>">Details</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <?php foreach ($data['items'] as $index => $item) : ?>
        <div class="modal fade" id="productDetails<?= $index ?>" tabindex="-1" role="dialog" aria-labelledby="productDetailsLabel<?= $index ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productDetailsLabel<?= $index ?>">Detail Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> <?= $item['Product_Name'] ?></p>
                        <p><strong>Price:</strong> <?= $item['Price'] ?></p>
                        <p><strong>Store Address:</strong> <?= $item['Owner_Address'] ?></p>
                        <p><strong>Status:</strong> <?= $item['Status'] ?></p>
                        <p><strong>Descriptions:</strong> <?= $item['Description'] ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary nonorderButton" 
                                 onclick="window.location.href=
                                '<?= BASEURL; ?>/Market/productOrder/<?= $item['Product_id'] . '/' . $item['Price']; ?>';">
                            Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        </div>
    </div>
    </div>
    <script>
    function sendPushNotification(message) {
        alert(message);
    }

    function showOrderNotification() {
        const notificationMessage = "Order successful! Please pick up your item at the store.";
        sendPushNotification(notificationMessage);
    }

    window.onload = function() {
        const orderButtons = document.querySelectorAll(".orderButton");
        orderButtons.forEach(button => {
            button.addEventListener("click", showOrderNotification);
        });
    };
</script>