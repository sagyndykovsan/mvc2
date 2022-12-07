<?php 

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router {
    private array $routes = [];

    public function __construct(private Request $request)
    {
    }

    public function register(string $method, string $path, callable|array $action)
    {
        $this->routes[$method][$path] = $action;
    }

    public function get(string $path, callable|array $action)
    {
        $this->register('get', $path, $action);
    }

    public function post(string $path, callable|array $action)
    {
        $this->register('post', $path, $action);
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        $action = null;
        $parameters = [$this->request];

        foreach($this->routes[$method] as $route => $callback) {
            if (preg_match("#^{$route}$#", $path, $matches) === 1) {
                unset($matches[0]);
                $action = $callback;

                $parameters = array_merge($parameters, $matches);
                break;
            }
        }

        if (! $action) {
            throw new RouteNotFoundException();
        }

        if (is_array($action)) {
            $class = $action[0];

            if (class_exists($class)) {
                $class = new $class();
                $callback = $action[1];

                if (method_exists($class , $callback)) {
                    return call_user_func_array([$class, $callback], $parameters);
                }
            }
        }

        if (is_callable($action)) {
            return call_user_func_array($action, $parameters);
        }

        throw new RouteNotFoundException();
    }
}