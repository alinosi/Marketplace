<?php 

    namespace app\models;
    use App\core\Database as Database;
    use PDOException;
    use Ramsey\Uuid\Uuid as Uuid;

    class Transactions_model {
        private $db;
        private $table = 'transactions';

        public function __construct(){
            $this->db = new DATABASE;
        }

        public function pushItem($orderId, $method, $productId) {
            $transactionId = Uuid::uuid4()->toString();
            $status = "On Progress";
        
            // Insert transaksi
            $this->db->query(
                "INSERT INTO {$this->table} (transactions_id, orders_id, payment_method, status)
                 VALUES (:transaction_id, :order_id, :payment_method, :status)"
            );
            $this->db->bind(':transaction_id', $transactionId);
            $this->db->bind(':order_id', $orderId);
            $this->db->bind(':payment_method', $method);
            $this->db->bind(':status', $status);
          
            $inserted = $this->db->execute();
          
            // Jika berhasil, lanjut update status orders
            if ($inserted) {
                $this->db->query(
                    "UPDATE products SET status = 'Ordered' WHERE product_id = :product_id"
                );
                $this->db->bind(':product_id', $productId);
                return $this->db->execute(); 
            }
          
            return false;
        }

    }