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

    public function form(Request $request)
    {
        return view('form');
    }

    public function showFormFields(Request $request)
    {
        return view('form', [
            'formData' => [
                'name' => $request->name,
                'age' => $request->age
            ]
        ]);
    }
}