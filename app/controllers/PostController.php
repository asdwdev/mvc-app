<?php

namespace App\Controllers;

class PostController
{
    public function detail($slug)
    {
        echo "artikel dengan slug: " . $slug;
    }
}
