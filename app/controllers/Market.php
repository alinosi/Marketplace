<?php 
    namespace app\controllers;

    use app\core\Controller as Controller;
    use app\core\Flasher;

    class Market extends Controller{
        public function index() {
            $data['judul'] = 'Market';
            $data['items'] = $this->model('Item_model')->getItems();
            $this->view('templates/header', $data);
            $this->view('market/index', $data);
            $this->view('templates/footer');
        }

        // public function order(){
        //     if (isset($_POST['order'])) {
        //         if ($this->model('Mahasiswa_model')->tambahMahasiswa($_POST) > 0 ) { 
        //             Flasher::setflash('Mahasiswa', 'berhasil ditambahkan', 'success');
        //             header('location:'.BASEURL.'/mahasiswa');
        //         }
        //         else {
        //             Flasher::setflash('Mahasiswa', 'gagal ditambahkan', 'danger');
        //             header('location:'.BASEURL.'/mahasiswa');                
        //         }
        //     }
        //     // var_dump($_POST);

        // }

        public function productOrder($productId,$productPrice){
            if (!isset($_SESSION['user_id'])) {
                header('location:'.BASEURL.'/login');
                exit;
            }
            $orderModel = $this->model('Item_model');
            if ($orderModel->selectItemById($productId,$productPrice)) {
                Flasher::setflash('Pemesanan', 'Pemesanan berhasil', 'success');
            }
            else {
                Flasher::setflash('Item', 'Item tidak ditemukan', 'danger');
            }
            header('Location: ' . BASEURL . '/Market'); // Redirect back to profile
            exit;
            
        }
    }
