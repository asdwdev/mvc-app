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

    public function show($id)
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        // cari user berdasarkan ID
        $user = null;
        foreach ($users as $u) {
            if ($u['id'] == $id) {
                $user = $u;
                break;
            }
        }

        if ($user) {
            echo "<h1>Detail User</h1>";
            echo "ID: {$user['id']} <br>";
            echo "Name: {$user['name']}";
        } else {
            echo "User dengan ID {$id} tidak ditemukan.";
        }
    }
}
