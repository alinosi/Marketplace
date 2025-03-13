<?php 
namespace app\controllers;

use app\core\Controller;
use app\core\Flasher;

class Sell extends Controller {
    public function index() {
        // Load the ProductModel
        $productModel = $this->model('Product_model');

        if( !isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
        } else {
            // Get the user ID from the session
            $userId = $_SESSION['user_id'];
        }

        // Fetch products for the logged-in user
        $data['products'] = $productModel->getProductsByUserId($userId);
        $data['judul'] = 'My Products';

        // Load the view
        $this->view('templates/header', $data);
        $this->view('sell/index', $data); // Adjust the view path as necessary
        $this->view('templates/footer');
    }

    public function add() {
        function generateRandomString($length = 5) {
            return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / 62))), 1, $length);
        }
        if (isset($_POST['submit'])) {
            // Get the posted data
            $productId = generateRandomString();
            $userId = $_POST['id_user'];
            $productName = $_POST['product_name'];
            $productCategory = $_POST['product_category'];
            $productPrice = $_POST['product_price'];
            $productDescription = $_POST['product_description'];
            $productImage = NULL;
            $status = 'Available';

            // Load the ProductModel
            $productModel = $this->model('Product_model');

            // Handle file upload (you may want to add validation here)
            $imagePath = 'uploads/' . basename($productImage['name']);
            move_uploaded_file($productImage['tmp_name'], $imagePath);

            // Add the product to the database
            if ($productModel->addProduct($productId, $userId, $productCategory, $status, $productName, $productImage, $productPrice, $productDescription, NULL)) {
                Flasher::setFlash('Product added successfully', '', 'success');
            } else {
                Flasher::setFlash('Failed to add product', '', 'danger');
            }

            header('Location: ' . BASEURL . '/sell/index'); // Redirect to product list
            exit;
        }
    }

    public function edit($id) {
        // Load the ProductModel
        $productModel = $this->model('Product_model');

        if (isset($_POST['submit'])) {
            // Get the posted data
            $productName = $_POST['product_name'];
            $productCategory = $_POST['product_category'];
            $productPrice = $_POST['product_price'];
            $productDescription = $_POST['product_description'];
            // $productImage = $_FILES['product_image'];

            // // Handle file upload (you may want to add validation here)
            // if ($productImage['name']) {
            //     $imagePath = 'uploads/' . basename($productImage['name']);
            //     move_uploaded_file($productImage['tmp_name'], $imagePath);
            // } else {
            //     $imagePath = null; // Keep the existing image if not updated
            // }

            // Update the product in the database
            if ($productModel->updateProduct($id, $productName, $productCategory, $productPrice, $productDescription, NULL)) {
                Flasher::setFlash('Product updated successfully', '', 'success');
            } else {
                Flasher::setFlash('Failed to update product', '', 'danger');
            }

            header('Location: ' . BASEURL . '/product'); // Redirect to product list
            exit;
        }

        // Fetch the product details for editing
        $data['product'] = $productModel->getProductById($id);
        $data['judul'] = 'Edit Product';

        // Load the edit view
        $this->view('templates/header', $data);
        $this->view('sell/index', $data); // Adjust the view path as necessary
        $this->view('templates/footer');
    }

    public function delete($id) {
        // Load the ProductModel
        $productModel = $this->model('Product_model');

        // Delete the product from the database
        if ($productModel->deleteProduct($id)) {
            Flasher::setFlash('Product deleted successfully', '', 'success');
        } else {
            Flasher::setFlash('Failed to delete product', '', 'danger');
        }

        header('Location: ' . BASEURL . '/sell/index'); // Redirect to product list
        exit;
    }
}