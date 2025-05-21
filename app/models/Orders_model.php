<?php 

    namespace app\models;
    use App\core\Database as Database;

    class Orders_model {
        private $db;

        public function __construct() {
            $this->db = new DATABASE;
        }

        public function getTransaction($productId, $sellerId) {
            $query = "
                  SELECT 
                    t.transactions_id,
                    t.payment_method,
                    t.status AS transaction_status,
                    t.transactions_date,
                    p.product_id,
                    p.product_name,
                    p.product_price,
                    p.image,
                    p.status AS product_status,
                    u.name AS buyer_name,
                    u.email AS buyer_email,
                    u.phone_number AS buyer_contact,
                    u.address AS buyer_address
                  FROM 
                      marketplace.transactions t
                  JOIN 
                      marketplace.orders o ON t.orders_id = o.orders_id
                  JOIN 
                      marketplace.products p ON o.product_id = p.product_id
                  JOIN 
                      marketplace.users u ON o.buyer_id = u.user_id
                  WHERE p.product_id = :product_id AND p.seller_id = :seller_id";

            $this->db->query($query);
            $this->db->bind(':product_id', $productId);
            $this->db->bind(':seller_id', $sellerId);
            return $this->db->single();      
        }

        public function transactionStatus($transactionId, $productId) {
            $status = "Delivered";

        $query = "UPDATE products SET status = :status WHERE product_id = :product_id";
        $this->db->query($query);
        $this->db->bind(':status', $status);
        $this->db->bind(':product_id', $productId);

        $inserted =  $this->db->execute();
        
        if ($inserted) {
            $this->db->query(
                "UPDATE transactions SET status = 'Success' WHERE transactions_id = :transaction_id"
            );
            $this->db->bind(':transaction_id', $transactionId);
            return $this->db->execute(); 
        }
      
        return false;

        }

        public function getItem($userId) {
            $query = "
                SELECT
                  o.orders_id     AS id,
                  s.name          AS seller_name,
                  s.address       AS seller_address,
                  s.phone_number  AS seller_phone,
                  p.* 
                FROM marketplace.orders   AS o
                JOIN marketplace.products AS p
                  ON o.product_id = p.product_id
                JOIN marketplace.users    AS s
                  ON p.seller_id   = s.user_id 
                WHERE o.buyer_id = :buyer_id";

            $this->db->query($query);
            $this->db->bind(':buyer_id', $userId);
            return $this->db->resultSet();
        }

        public function deleteOrder($id) {
            $query = "DELETE FROM orders WHERE orders_id = :id";
            $this->db->query($query);
            $this->db->bind(':id', $id);
            return $this->db->execute();
        }
    }

?>