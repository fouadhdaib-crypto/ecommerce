<?php
declare(strict_types=1);

namespace App\Core;

use PDO;

final class Database
{
    private string $host = "localhost";
    private string $database = "ecommerce";
    private string $username = "root";
    private string $password = "1234";

    public function connect(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";

        $pdo = new PDO(
            $dsn,
            $this->username,
            $this->password
        );

        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );

        $pdo->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        );

        $pdo->setAttribute(
            PDO::ATTR_EMULATE_PREPARES,
            false
        );

        return $pdo;
    }
}
