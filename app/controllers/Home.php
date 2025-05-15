<?php 

    namespace app\controllers;

    use app\core\Controller as Controller;

    class Home extends Controller {
        public function index() {
            $data['judul'] = 'Home';
            $data['items'] = $this->model('Item_model')->getBestItems();
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }    