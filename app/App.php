<?php 

declare(strict_types=1);

namespace App;

use App\DB;
use App\Router;
use App\Response;
use App\Exceptions\RouteNotFoundException;

class App {
    public function __construct(private Router $router, 
        protected Response $response,
        Config $config)
    {
        // DB::connect($config->db ?? []);
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (RouteNotFoundException) {
            $this->response->setStatusCode(404);
            echo view('_404');
        }
    }
}