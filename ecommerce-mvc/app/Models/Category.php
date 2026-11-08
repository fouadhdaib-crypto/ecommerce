<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;


final class Category
{
        private Database $database;
        private PDO $connection;

        public function __construct()
        {




                $this->database = new Database();
               $this->connection = $this->database->connect();
        }

        public function GetallCategory(): array
        {
                return $this->connection->query(
                        'SELECT * FROM categories ORDER BY id DESC'
                )->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addnewCategory(string $name): void
        {
                $stmt = $this->connection->prepare(
                        'INSERT INTO categories (name) VALUES (:name)'
                );
                $stmt->bindParam(':name', $name);
                $stmt->execute();
        }

        public function updateCategory(int $id, string $name): void
        {
                $stmt = $this->connection->prepare(
                        'UPDATE categories SET name = :name WHERE id = :id'
                );
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->execute();
        }
}
