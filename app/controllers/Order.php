<?php 

    namespace app\controllers;

    use app\core\Flasher;
    use app\core\Controller;

    class Order extends Controller {
        public function index() {
            $data['judul'] = 'REGISTER';
            $this->view('templates/header', $data);
            $this->view('account/register', $data);
            $this->view('templates/footer');
        }

        public function detail($productId) {
            $sellerId = $_SESSION['user_id'];

            $data['judul'] = 'DETAIL ORDER';
            $data['transaction'] = $this->model('Orders_model')->getTransaction($productId, $sellerId);
            $this->view('templates/header', $data);
            $this->view('sell/transaction', $data);
            $this->view('templates/footer');
        }

        public function delivered($transactionId, $productId) {
            if (isset($_POST['submit'])) {
                $orderStatus = $this->model('Orders_model');
                
                if($orderStatus->transactionStatus($transactionId, $productId)) {
                    Flasher::setflash('Transaksi Berhasil.', ' Anda akan dihubungi oleh pemilik barang', 'success');
                } else {
                    Flasher::setflash('Transaksi Gagal', '', 'danger');
                }
            }
            
            header("Location: " . BASEURL . "/Order/detail/$productId"); // Redirect to product list
            exit;
        }
    }
?>