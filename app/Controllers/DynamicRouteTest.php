<?php 

declare(strict_types=1);

namespace App\Controllers;

use App\Request;

class DynamicRouteTest {
    public function index(string $queryString)
    {
        return $queryString;
    }
}