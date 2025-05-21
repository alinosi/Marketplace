<?php 

    namespace app\models;
    use App\core\Database as Database;
    use PDOException;
    use Ramsey\Uuid\Uuid;

    class Transactions_model {
        private $db;

        public function __construct(){
            $this->db = new DATABASE;
        }

        public function pushItem($orderId, $method) {
            $transactionId = Uuid::uuid4()->toString();

            $this->db->query("INSERT INTO transactions VALUES (:trasantion_id, :order_id, :method)");
            $this->db->bind(':transaction', $transactionId);
            $this->db->bind(':order_id', $orderId);
            $this->db->bind(':method', $method);
            
            return $this->db->execute(); // Execute the query
        }
    }