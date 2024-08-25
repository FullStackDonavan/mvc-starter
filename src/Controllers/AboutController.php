<?php

namespace App\Controllers;

use App\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $this->render('about');
    }
}
