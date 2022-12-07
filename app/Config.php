<?php 

declare(strict_types=1);

namespace App;

class Config {

    public array $config = [];

    public function __construct()
    {
        $this->config = [
            'db' => [
                'driver' => $_ENV['DB_DRIVER'],
                'host' => $_ENV['DB_HOST'],
                'dbname' => $_ENV['DB_NAME'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
            ]
            ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}