<?php 
namespace app\controllers;

use app\core\Controller;
use app\core\Flasher;
use app\models\UserModel; // Assuming you have a UserModel for database interaction

class Profile extends Controller {
    public function index() {
        $userModel = $this->model('User_model');

        if( !isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0) {
            header('Location: ' . BASEURL . '/login');
        }
        else {
            $userId = $_SESSION['user_id'];
        }

        $data['user'] = $userModel->getUserById($userId); // Method to fetch user data by ID
        $data['judul'] = 'User  Profile';
        
        // Load the profile view
        $this->view('templates/header', $data);
        $this->view('account/profile', $data);
        $this->view('templates/footer');
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the posted data
            $userId = $_SESSION['user_id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            // Load the UserModel
            $userModel = $this->model('User_Model');

            // Update user data in the database
            if ($userModel->updateUser ($userId, $name, $phone, $address)) {
                Flasher::setFlash('Update successful', 'Your profile has been updated', 'success');
            } else {
                Flasher::setFlash('Update failed', 'Something went wrong', 'danger');
            }

            header('Location: ' . BASEURL . '/profile'); // Redirect back to profile
            exit;
        }

    }
}