<?php 
    namespace app\core;
    use PDO;
    use PDOException;

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db_name = DB_NAME;

        private $dbh; // databse handler; untuk menampung koneksi database
        private $stmt; // statement; untuk menampung perintah SQL/query

        // menyambung ke database
        public function __construct() {
            // data source name
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name; // simpan alamat databse
            // $dsn = mysql:host=userlog;dbname=mahasiswa;

            $option = [
                PDO::ATTR_PERSISTENT => true, // koneksi database tetap aktif
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // jika terjadi error, maka akan
            ];
            
            try { // cek apakah database berhasil terhubung atau tidak
                $this->dbh = new PDO($dsn, $this->user , $this->pass, $option); // koneksi database
            }   
            catch(PDOException $e) { // apabila error maka masukkan erorr ke $e
                die ($e->getMessage()); // bila erorr berikan pesannya dan hentikan program
            } 
        }
        // function untuk melakukan query database
        public function query($query) {
            $this->stmt = $this->dbh->prepare($query); // persiapan perintah
        }

        // function unutk membersihkan query jahat dan update nilai
        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (gettype($value)) {
                    case 'integer':
                        $type = PDO::PARAM_INT;
                        break;
                    case 'string':
                        $type = PDO::PARAM_STR;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }              
            }
            $this->stmt->bindValue($param, $value, $type); 
        }

        public function execute(){
            return $this->stmt->execute(); // eksekusi perintah SQL/query
        }

        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // ambil hasilnya dalam bentuk array, tapi seluruh data
        }

        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC); // ambil hasilnya dalam bentuk, tapi hanya satu data
        }
    }
?>