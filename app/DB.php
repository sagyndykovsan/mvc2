<?php 

declare(strict_types=1);

namespace App;

use PDO;

class DB {
    private static PDO $pdo;

    public static function connect(array $config)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            static::$pdo = new PDO($config['DB_DRIVER'] . ':host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'],
                $config['DB_USER'],
                $config['DB_PASSWORD'],
                $defaultOptions);
        } catch (\PDOException $error) {
            throw new \PDOException($error->getMessage() . $error->getCode());
        }
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([static::$pdo, $name], $arguments);
    }
}