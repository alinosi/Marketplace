<?php 
    namespace app\models;
    use App\core\Database as Database;
    
    class Item_model {
        private $db;

        // koneksi database
        public function __construct(){
            $this->db = new DATABASE;
        }

        // 
        public function getItems(){
            $this->db->query(
            'SELECT
                p.product_id AS Product_id,
                p.product_name AS Product_Name,
                p.product_price AS Price,
                p.status AS Status,
                c.categories AS Category,
                u.address AS Owner_Address,
                u.user_id AS Owner_Product,
                p.descriptions AS Description
            FROM 
                products p
            JOIN 
                categories c ON p.categories_id = c.categories_id
            JOIN 
                users u ON p.user_id = u.user_id');
            return $this->db->resultSet();

        }

        public function getItemByeId($id){
            $this->db->query('SELECT * FROM products WHERE product_id = :id');
            $this->db->bind('id', $id);
            return $this->db->single();
           }

        public function selectItemById($id,$price){
            $userId = $_SESSION['user_id'];
            $orderId = random_int(1, 10000);
        
            $this->db->query(
                "INSERT INTO orders (orders_id, user_id, product_id, order_date, product_price)
                VALUES (:order_id, :user_id, :id, '2024-01-20', :product_price)"
            );
        
            $this->db->bind('order_id', $orderId);
            $this->db->bind('user_id', $userId);
            $this->db->bind('id', $id);
            $this->db->bind('product_price', $price);
        
            return $this->db->execute();
        }

    //     public function getMahasiswaByID($id){
    //         $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    //         $this->db->bind('id', $id);
    //         return $this->db->single();
    //     }

    //     public function tambahMahasiswa($duar){
    //         $nama = $duar['nama'];
    //         $nim = $duar['nim'];
    //         $email = $duar['email'];
    //         $jurusan = $duar['jurusan'];
    //         $this->db->query('INSERT INTO ' . $this->table .  " VALUES (NULL, '$nama', '$nim', '$email', '$jurusan')");
    //         return $this->db->execute();
    //     }
    }