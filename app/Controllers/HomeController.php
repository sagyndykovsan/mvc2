<?php 

declare(strict_types=1);

namespace App\Controllers;

class HomeController {
    public function index()
    {
       return view('homepage'); 
    }

    public function post(string $postnumber)
    {
        return $postnumber;
    }
}