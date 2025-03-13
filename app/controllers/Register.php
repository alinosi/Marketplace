<?php 
namespace app\controllers;

use app\core\Flasher;
use app\core\Controller;

class Register extends Controller {
    public function index() {
        $data['judul'] = 'REGISTER';
        $this->view('templates/header', $data);
        $this->view('account/register', $data);
        $this->view('templates/footer');
    }

    public function store() {
        if (isset($_POST['submit'])) {
            // Get the posted data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            // Validate password match
            if ($password !== $confirmPassword) {
                Flasher::setFlash('Registration failed', 'Passwords do not match', 'danger');
                header('Location: ' . BASEURL . '/register'); // Redirect back to register
                exit;
            }

            // Load the UserModel
            $userModel = $this->model('User_model');

            // Check if the email already exists
            if ($userModel->getUserByEmail($email)) {
                Flasher::setFlash('Registration failed', 'Email already exists', 'danger');
                header('Location: ' . BASEURL . '/register');
                exit;
            }

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Register the user
            if ($userModel->registerUser ($name, $email, $hashedPassword, $address, $phone)) {
                Flasher::setFlash('Registration successful', 'You can now log in', 'success');
                header('Location: ' . BASEURL . '/login');
                exit;
            } else {
                Flasher::setFlash('Registration failed', 'Something went wrong', 'danger');
                header('Location: ' . BASEURL . '/register');
                exit;
            }
        }
    }
}