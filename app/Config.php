<?php 

declare(strict_types=1);

namespace App;

class Config {

    public array $config = [];

    public function __construct()
    {
        $this->config = [
            'db' => [
                'DB_DRIVER' => $_ENV['DB_DRIVER'],
                'DB_HOST' => $_ENV['DB_HOST'],
                'DB_NAME' => $_ENV['DB_NAME'],
                'DB_USER' => $_ENV['DB_USER'],
                'DB_PASSWORD' => $_ENV['DB_PASSWORD'],
            ]
            ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}