<?php 

declare(strict_types=1);

namespace App;

class Request {
    private string $requestMethod;

    public function __construct()
    {
        $this->requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getMethod(): string
    {
        return $this->requestMethod;
    }

    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function __get($name)
    {
        $data = null;

        // get data from only one request method
        if ($this->getMethod() === 'post') {
            $data = $_POST[$name] ?? null;
        } else if ($this->getMethod() === 'get') {
            $data = $_GET[$name] ?? null;
        }

        // escape input data if request param exist
        if ($data) {
            $data = htmlentities($data);
        }

        return $data;
    }
}