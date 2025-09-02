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
        echo "<h1>Detail User</h1>";
        echo "User ID: " . $id;
    }

    public function store()
    {
        // misalnya ambil data dari POST
        $name = $_POST['name'] ?? "Anonim";
        echo "User baru berhasil ditambahkan: " . $name;
    }

    public function update($id)
    {
        // ambil body request (PUT biasanya raw data)
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'] ?? "Anonim";

        echo "User dengan ID {$id} berhasil diupdate jadi: {$name}";
    }

    public function destroy($id)
    {
        echo "User dengan ID {$id} berhasil dihapus.";
    }
}
