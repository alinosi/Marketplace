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
            padding: 0 20px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #333;
        }

        .cart-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 20px;
        }

        .cart-item {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 20px;
            transition: transform 0.2s;
        }

        .cart-item:hover {
            transform: translateY(-5px);
        }

        .item-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .item-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #222;
        }

        .item-seller {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .item-seller i {
            margin-right: 5px;
            font-size: 0.8rem;
        }

        .item-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #ff4500;
            margin-bottom: 10px;
        }

        .item-quantity {
            display: flex;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            background-color: #f0f0f0;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .quantity-btn:hover {
            background-color: #e0e0e0;
        }

        .quantity-input {
            width: 50px;
            height: 32px;
            text-align: center;
            border: 1px solid #eee;
            border-radius: 8px;
            margin: 0 10px;
            font-size: 0.9rem;
        }

        .item-actions {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 15px;
        }

        .action-btn {
            background: none;
            border: none;
            color: #666;
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .action-btn:hover {
            color: #111;
        }

        .checkout-btn {
            background-color: #111;
            color: white;
            border: none;
            border-radius: 12px;
            width: 100%;
            padding: 15px;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .checkout-btn:hover {
            background-color: #333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Badge style for item count */
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

        .divider {
            height: 1px;
            background-color: #eee;
            margin: 15px 0;
        }

  .payment-options {
            margin-top: 30px;
        }
        
        .payment-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .payment-methods {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .payment-method {
            border: 2px solid var(--grey-color);
            border-radius: 8px;
            padding: 10px 15px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-method:hover {
            border-color: var(--primary-color);
        }
        
        .payment-method.active {
            border-color: var(--primary-color);
            background-color: rgba(67, 97, 238, 0.1);
        }

        @media (max-width: 768px) {
            .cart-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
<body>
    <!-- Main Content -->
    <div class="container">
        <h1 class="page-title">Shopping Cart</h1>
        <div class="col-6">
            <?php Flasher::flash()?>
        </div>
        <div class="cart-container">
            <?php foreach($data['items'] as $item) : ?>
            <!-- Cart Item 1 -->
            <div class="cart-item">
                <img src="<?= BASEURL . "/img/" . $item['image'] ?>" alt="<?= $item['product_name'] ?>" class="item-image">
                <h3 class="item-name"><?= $item['product_name'] ?></h3>
                <div class="item-seller">
                    <i class="fas fa-store"></i><?= $item['seller_name'] ?>
                </div>
                <div class="item-seller">
                    <i class="fas fa-map-marker-alt"></i><?= $item['seller_address'] ?>
                </div>
                <div class="item-price"><?= "Rp. " . number_format($item['product_price'], 0, ',', '.') ?></div>
                
                <div class="item-quantity">
                    Quantity<input type="text" class="quantity-input" value="1" readonly>
                </div>

                 <div class="payment-options">
                    <h3 class="payment-title">Payment Method</h3>
                    <div class="payment-methods">
                        <div class="payment-method">COD</div>
                    </div>
                </div>
                
                <div class="divider"></div>
                
                <div class="item-actions">
                    <button class="action-btn">
                        <i class="far fa-heart"></i> Wishlist
                    </button>
                    <button class="action-btn">
                        <i class="far fa-trash-alt"></i> <a href="<?= BASEURL; ?>/Cart/delete/<?= $item['id'] ?>">Delete</a>
                    </button>
                </div>
                    <!-- <a href=""><button class="checkout-btn">Check-out</button></a> -->
                    <form action="<?= BASEURL; ?>/Cart/transactions/<?= $item['id'] ?>" method="post">
                        <button class="checkout-btn" name="submit">Check-out</button>
                    </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        // JavaScript untuk fungsionalitas tombol kuantitas
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('.quantity-input');
                let value = parseInt(input.value);
                
                if (this.getAttribute('data-action') === 'increase') {
                    value++;
                } else if (this.getAttribute('data-action') === 'decrease' && value > 1) {
                    value--;
                }
                
                input.value = value;
            });
        });
    </script>
      <script>
      // JavaScript untuk fungsionalitas tombol kuantitas (tetap dipertahankan)
      document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
          const input = this.parentNode.querySelector('.quantity-input');
          let value = parseInt(input.value);

          if (this.getAttribute('data-action') === 'increase') {
            value++;
          } else if (this.getAttribute('data-action') === 'decrease' && value > 1) {
            value--;
          }

          input.value = value;
        });
      });
    </script>
</body>
</html>