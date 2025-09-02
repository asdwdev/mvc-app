<?php
// controllers/UserController.php
require_once __DIR__ . "/../models/User.php";

class UserController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        // kirim data ke view
        include __DIR__ . '/../views/user_view.php';
    }
}
