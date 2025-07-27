<?php

namespace App\Kernel\Database;

use App\Kernel\Config\ConfigInterface;
use App\Kernel\Database\DatabaseInterface;

class Database implements DatabaseInterface
{
    private \PDO $pdo;

    public function __construct(
        private ConfigInterface $config
    )
    {
        $this->connect();
    }
    public function connect():void
    {
        $driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');

        try {
            $this->pdo = new \PDO("$driver:host=$host;port=$port;dbname=$database",
                $username,
                $password);
        }catch (\PDOException $e){
            exit('Database connection failed: ' . $e->getMessage());
        }
    }

    public function insert(string $table, array $data): int|false
    {
        // TODO: Implement insert() method.
    }


}