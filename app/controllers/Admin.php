<?php 
namespace app\controllers;

use app\core\Flasher;
use app\core\Controller;

class Admin extends Controller {
    public function index() {
        $data['judul'] = 'ADMIN LOGIN';
        $this->view('templates/header', $data);
        $this->view('account/adminlogin', $data);
        $this->view('templates/footer');
    }

    public function authenticate() {
        if (isset($_POST['submit'])) {
            // Get the posted data
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Load the UserModel
            $userModel = $this->model('Admin_model');

            // Check if the user exists and the password is correct
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                // Set session variables or any other logic for successful login
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirect to the dashboard or home page
                header('Location: ' . BASEURL . '/Admin/dashboard'); // Adjust BASE_URL as needed
                exit;
            } else {
                // Set an error message
                Flasher::setFlash('Login failed', 'Invalid email or password', 'danger');
                header('Location: ' . BASEURL . '/Admin'); // Redirect back to login
                exit;
            }
        }
    }

    public function dashboard() {
        $data['judul'] = 'ADMIN PANELS';
        $data['user'] = $this->model('User_model')->getuser();
        $this->view('admindashboard/index', $data);
    }

    public function delete($id) {
        // Load the ProductModel
        $user = $this->model('User_model');

        // Delete the product from the database
        if ($user->deleteUser($id)) {
            Flasher::setFlash('Account successfully delected', '', 'success');
        } else {
            Flasher::setFlash('Failed to delete Account', '', 'danger');
        }

        header('Location: ' . BASEURL . '/Admin/dashboard'); // Redirect to product list
        exit;
    }
}