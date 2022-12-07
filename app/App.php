<?php 

declare(strict_types=1);

namespace App;

use App\DB;
use App\Router;
use App\Exceptions\RouteNotFoundException;

class App {
    public function __construct(private Router $router, Config $config)
    {
        DB::connect($config->db ?? []);
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (RouteNotFoundException) {
            echo view('_404');
        }
    }
}