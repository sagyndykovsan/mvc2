<?php 

declare(strict_types=1);

use App\App;
use App\Config;
use App\Router;
use App\Request;
use Dotenv\Dotenv;
use App\Controllers\HomeController;

require_once '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../views');

$request = new Request();
$router = new Router($request);
$config = new Config();
$app = new App($router, $config);

$router->get('/', [HomeController::class, 'index']);

$app->run();