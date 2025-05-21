<style>
    body {
        background-color: #f5f5f5;
        color: #333;
    }

    .transaction-card {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-bottom: 30px;
    }
    
    .transaction-header {
        background-color: #f8f9fa;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #eee;
    }
    
    .transaction-id h5 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }
    
    .transaction-date {
        font-size: 0.9rem;
        color: #666;
    }
    
    .payment-badge {
        background-color: #111;
        color: white;
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .transaction-body {
        padding: 25px;
    }
    
    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 1px solid #eee;
    }
    
    .product-info-section, .buyer-info-section {
        margin-bottom: 25px;
    }
    
    .product-info {
        display: flex;
        align-items: center;
    }
    
    .product-thumbnail {
        width: 80px;
        height: 80px;
        min-width: 80px;
        border-radius: 8px;
        overflow: hidden;
        margin-right: 15px;
        border: 1px solid #eee;
    }
    
    .product-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .product-details .product-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }
    
    .product-details .product-price {
        font-size: 1rem;
        font-weight: bold;
        color: #ff4500;
    }
    
    .buyer-details {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 12px;
    }
    
    .info-row {
        display: flex;
        margin-bottom: 10px;
    }
    
    .info-row:last-child {
        margin-bottom: 0;
    }
    
    .info-label {
        font-weight: 600;
        width: 100px;
        min-width: 100px;
        color: #555;
    }
    
    .info-value {
        color: #333;
        flex-grow: 1;
    }
    
    .transaction-action {
        text-align: center;
        margin-top: 30px;
    }
    
    .btn-delivered {
        background-color: #111;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 12px 25px;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 220px;
    }
    
    .btn-delivered i {
        margin-right: 8px;
    }
    
    .btn-delivered:hover {
        background-color: #333;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .btn-delivered-disabled {
        background-color: #666;
        color: #ccc;
        cursor: not-allowed;
        opacity: 0.7;
    }
    
    .btn-delivered-disabled:hover {
        transform: none;
        box-shadow: none;
        background-color: #666;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .transaction-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .payment-method {
            margin-top: 10px;
        }
        
        .info-row {
            flex-direction: column;
        }
        
        .info-label {
            width: 100%;
            margin-bottom: 3px;
        }
        
        .btn-delivered {
            width: 100%;
        }
    }
</style>

<!-- Product Detail Page -->
<div class="container">
    <h1 class="page-title">Transaction Detail</h1>
    
    <!-- Back button -->
    <a href="<?= BASEURL; ?>/Sell" class="btn-add-product" style="margin-bottom: 30px;">
        <i class="fas fa-arrow-left"></i> Back to Orders
    </a>
    
    <!-- Transaction Detail Card -->
    <div class="transaction-card">
        <div class="transaction-header">
            <div class="transaction-id">
                <h5>Transaction #<?= $data['transaction']['transactions_id']; ?></h5>
                <span class="transaction-date"><?= date('d M Y, H:i', strtotime($data['transaction']['transactions_date'])); ?></span>
            </div>
            <div class="payment-method">
                <span class="payment-badge"><?= $data['transaction']['payment_method']; ?></span>
            </div>
        </div>
        
        <div class="transaction-body">
            <!-- Product Information -->
            <div class="product-info-section">
                <h6 class="section-title">Product Details</h6>
                <div class="product-info">
                    <div class="product-thumbnail">
                        <img src="<?= BASEURL . '/img/' . $data['transaction']['image'] ?>" alt="<?= $data['transaction']['product_name']; ?>">
                    </div>
                    <div class="product-details">
                        <h5 class="product-title"><?= $data['transaction']['product_name']; ?></h5>
                        <p class="product-price"><?= "Rp " . number_format($data['transaction']['product_price'], 0, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Buyer Information -->
            <div class="buyer-info-section">
                <h6 class="section-title">Buyer Information</h6>
                <div class="buyer-details">
                    <div class="info-row">
                        <span class="info-label">Name:</span>
                        <span class="info-value"><?= $data['transaction']['buyer_name']; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?= $data['transaction']['buyer_email']; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phone:</span>
                        <span class="info-value"><?= $data['transaction']['buyer_contact']; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Address:</span>
                        <span class="info-value"><?= $data['transaction']['buyer_address']; ?></span>
                    </div>
                </div>
            </div>
            
            <!-- Action Button -->
            <form action="<?= BASEURL; ?>/Order/delivered/<?= $data['transaction']['transactions_id'] ?>/<?= $data['transaction']['product_id'] ?>" method="POST">
                <div class="transaction-action">
                        <?php if ($data['transaction']['product_status'] == 'Ordered' || $data['transaction']['product_status'] == 'Available' ) : ?>
                            <button id="deliveredBtn" class="btn-delivered" name="submit">
                                <i class="fas fa-check-circle"></i> Mark as Delivered
                            </button>
                        <?php else : ?>
                            <button id="deliveredBtn" class="btn-delivered btn-delivered-disabled" disabled>
                                <i class="fas fa-check-circle"></i> Product Delivered
                            </button>
                        <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>