<?php

namespace App\Controllers;

use App\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $this->render('blog');
    }
}
