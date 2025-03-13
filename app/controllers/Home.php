<?php 
    namespace app\controllers;

    use app\core\Controller as Controller;

    class Home extends Controller {
        public function index() {
            $data['judul'] = 'HOME';
            $data['nama']  = $this->model('User_model')->getUser();
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }

    



    