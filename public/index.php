<?php 

declare(strict_types=1);

use App\App;
use App\Router;
use App\Request;
use App\Controllers\HomeController;
use App\Response;

require_once '../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../views');

$request = new Request();
$router = new Router($request);
$app = new App($router, new Response());

$router->get('/', [HomeController::class, 'index']);
$router->get('/form', [HomeController::class, 'form']);
$router->post('/form', [HomeController::class, 'showFormFields']);
$router->get('/(.+)', [DynamicRouteTest::class, 'index']);

$app->run();