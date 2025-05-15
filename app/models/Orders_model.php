<?php 

    namespace app\models;
    use App\core\Database as Database;

    class Orders_model {
        private $db;

        public function __construct() {
            $this->db = new DATABASE;
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
                  ON p.user_id   = s.user_id 
                WHERE o.user_id = :buyer_id";

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