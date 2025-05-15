<?php 

    namespace app\controllers;

    use app\core\Flasher;
    use app\core\Controller;

    class Cart extends Controller {
        public function index() {
            
            if( !isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0) {
                header('Location: ' . BASEURL . '/login');
            } else {
                // Get the user ID from the session
                $userId = $_SESSION['user_id'];
            }

            $data['judul'] = 'Home';
            $data['items'] = $this->model('Orders_model')->getItem($userId);
            $this->view('templates/header', $data);
            $this->view('cart/index', $data);
            $this->view('templates/footer');
        }

        public function delete($id){
            // Load the ProductModel
            $orderModel = $this->model('Orders_model');
            
            // Delete the order from the database
            if ($orderModel->deleteOrder($id)) {
                Flasher::setFlash('Order berhasil dihapus', '', 'success');
            } else {
                Flasher::setFlash('Failed to delete Order', '', 'danger');
            }
        
            header('Location: ' . BASEURL . '/cart'); // Redirect to product list
            exit;
            
        }
    }  

?>