<?php 

declare(strict_types=1);

namespace App\Controllers;

class HomeController {
    public function index()
    {
       return view('homepage'); 
    }
}