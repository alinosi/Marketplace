<?php 
namespace app\controllers;

use app\core\Flasher;
use app\core\Controller;

class Login extends Controller {
    public function index() {
        $data['judul'] = 'LOGIN';
        $this->view('templates/header', $data);
        $this->view('account/login', $data);
        $this->view('templates/footer');
    }

    public function authenticate() {
        if (isset($_POST['submit'])) {
            // Get the posted data
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Load the UserModel
            $userModel = $this->model('User_model');

            // Check if the user exists and the password is correct
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                // Set session variables or any other logic for successful login
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['login'] = true;

                // Redirect to the dashboard or home page
                header('Location: ' . BASEURL . '/Home'); // Adjust BASE_URL as needed
                exit;
            } else {
                // Set an error message
                Flasher::setFlash('Login failed', 'Invalid email or password', 'danger');
                header('Location: ' . BASEURL . '/Admin'); // Redirect back to login
                exit;
            }
        }
    }
}