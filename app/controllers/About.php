<?php 
namespace app\controllers;

use app\core\Flasher;
use app\core\Controller;

class About extends Controller {
    public function index() {
        $data['judul'] = 'ABOUT';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

}

