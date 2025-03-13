<?php 
    namespace app\core;
    
    // INI ADALAH ROUTE
    class App {
        protected $controller = 'Home'; // Set default controller
        protected $method = 'index'; // Set default method
        protected $params = []; // Set default params

        public function __construct() {
            $url = $this->parseUrl(); // mengambil url yang berisi controller/method/parameter1/parameter2/dst..

            if(isset($url[0])){
            // controller
                if(file_exists(__DIR__ . '/../controllers/' . $url[0] . '.php')){ // mengecek apakah ada controller yang diminta
                    $this->controller = $url[0]; // mengambil controller baru
                    unset($url[0]); // menghapus controller dari array url
                }
            }
            require_once __DIR__ . '/../controllers/' . $this->controller . '.php'; // memanggil controller
            $controllerClass = 'app\\controllers\\' . $this->controller; // karena controller menggunakan namespace maka nama dari controller harus lengkap beserta namespacenya
            $this->controller = new $controllerClass; // membuat objek controller

            // method
            if(isset($url[1])){ // mengecek apakah ada method yang diinput
                if(method_exists($this->controller, $url[1])){ // mengecek apakah method yang diinput tersedia di class
                    $this->method = $url[1]; // mengambil method baru
                    unset($url[1]); // menghapus method dari array url
                }
            }

            // parameter
            if(!empty($url)) { // mengecek apakah url saat ini tidak kosong
                $this->params = array_values($url); // mereset kembali indeks array menjadi 0.
            }

            // jalankan controller, method dan kirim parameter jika ada
            call_user_func_array([$this->controller,$this->method],$this->params); // templatenya (function,parameter)
        
        }
        public function parseUrl() {
            if(isset($_GET['url'])) { // cek apakah ada url yang dikirim
                $url = rtrim($_GET['url']); // menghilangkan tanda '\' diakhir url
                $url = filter_var($url, FILTER_SANITIZE_URL); // memfilter karakter
                $url = explode('/', $url); // memecah batas '/' karakter menjadi array
                return $url;
            }
        }
    }