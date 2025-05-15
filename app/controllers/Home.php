<?php 

    namespace app\controllers;

    use app\core\Controller as Controller;

    class Home extends Controller {
        public function index() {
            if (!isset($_SESSION['user_id'])) {
                $_SESSION['user_id'] = 0;
            }
            $data['judul'] = 'Home';
            $data['items'] = $this->model('Item_model')->getBestItems($_SESSION['user_id']);
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }    