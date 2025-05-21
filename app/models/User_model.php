<?php 
    namespace app\models;
    use App\core\Database as Database;
    use PDOException;

    class User_model {
        private $table ='users';
        private $db;

        // koneksi database
        public function __construct(){
            $this->db = new DATABASE;
        }

        public function getuser(){
            $this->db->query("SELECT * FROM ". $this->table);
            return $this->db->resultSet();
        }

        public function getUserByEmail($email) {
            $this->db->query("SELECT * FROM  " .  $this->table  . "  WHERE email = :email");
            $this->db->bind(':email', $email);
            return $this->db->single(); // Fetch a single user record
        }

        public function registerUser ($name, $email, $password, $address, $phone) {
            $this->db->query("INSERT INTO ". $this->table . " VALUES (NULL, :name, :address, :phone, :email, :password)");
            $this->db->bind(':name', $name);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $password);
            $this->db->bind(':address', $address);
            $this->db->bind(':phone', $phone);
            return $this->db->execute(); // Execute the query
        }

        // 
        public function getItems(){
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet();
        }

        public function getUserById($id) {
            $this->db->query("SELECT * FROM ". $this->table . " WHERE user_id = :id");
            $this->db->bind(':id', $id);
            return $this->db->single(); // Fetch single user data
        }

        public function updateUser ($id, $name, $phone, $address) {
            $this->db->query("UPDATE " . $this->table . " SET name = :name, phone_number = :phone, address = :address WHERE user_id = :id");
            $this->db->bind(':name', $name);
            $this->db->bind(':phone', $phone);
            $this->db->bind(':address', $address);
            $this->db->bind(':id', $id);
            return $this->db->execute(); // Execute the update query
        }

        public function deleteUser($id) {
            try {
                $query = "DELETE FROM " . $this->table . " WHERE user_id = :id";
                $this->db->query($query);
                $this->db->bind(':id', $id);
                return $this->db->execute();
            } catch (PDOException $e) {
                return false;
            }

        }
    }
