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

        public function pushItem($orderId, $method) {
            $transactionId = Uuid::uuid4()->toString();

            $this->db->query(
                "INSERT INTO " . $this->table . " (transactions_id, orders_id, payment_method)
                VALUES (:transaction_id, :order_id, :payment_method)"
              );

            $this->db->bind(':transaction_id', $transactionId);
            $this->db->bind(':order_id', $orderId);
            $this->db->bind(':payment_method', $method);
            
            return $this->db->execute(); // Execute the query
        }
    }