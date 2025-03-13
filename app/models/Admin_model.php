<?php 
    namespace app\models;
    use App\core\Database as Database;

    class Admin_model {
        private $db;
        private $table = 'admin';

        // koneksi database
        public function __construct(){
            $this->db = new DATABASE;
        }

        public function getUserByEmail($email) {
            $this->db->query("SELECT * FROM " .  $this->table  . " WHERE email = :email");
            $this->db->bind(':email', $email);
            return $this->db->single(); // Fetch a single user record
        }
    }
?>