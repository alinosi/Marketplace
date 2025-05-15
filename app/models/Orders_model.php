<?php 

    namespace app\models;
    use App\core\Database as Database;

    class Item_model {
        private $db;

        public function __construct() {
            $this->db = new DATABASE;
        }

        public function getItem($userId) {
            $query = "
                SELECT
                  o.orders_id    AS id,
                  u.name,
                  u.address,
                  u.phone_number,
                  p.*
                FROM marketplace.orders AS o
                JOIN marketplace.users    AS u ON o.user_id    = u.user_id
                JOIN marketplace.products AS p ON o.product_id = p.product_id
                WHERE o.user_id = :user_id";

            $this->db->query($query);
            $this->db->bind(':user_id', $userId);
            return $this->db->resultSet();
        }

    }

?>