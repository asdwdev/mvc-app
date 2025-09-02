<?php

namespace App\Models;

class User
{
    public function getAllUsers()
    {
        return [
            ["id" => 1, "name" => "Andi"],
            ["id" => 2, "name" => "Budi"],
            ["id" => 3, "name" => "Citra"]
        ];
    }
}
