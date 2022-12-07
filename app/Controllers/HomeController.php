<?php 

declare(strict_types=1);

namespace App\Controllers;

use App\Request;

class HomeController {
    public function index()
    {
       return view('homepage', [
        'message' => 'This message from HomeController'
       ]);
    }

    public function post(Request $request, string $postnumber)
    {
        echo $request->name;
        return $postnumber;
    }
}