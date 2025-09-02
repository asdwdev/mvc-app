<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        echo "<h1>Daftar User</h1><ul>";
        foreach ($users as $user) {
            echo "<li>{$user['id']} - {$user['name']}</li>";
        }
        echo "</ul>";
    }
}
