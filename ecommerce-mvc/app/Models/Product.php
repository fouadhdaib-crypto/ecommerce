<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;


   

final class Product
{

   private Database $database;
    private PDO $connection;
   
    public function __construct() {




            $this->database = new Database();
            $this->connection = $this->database->connect(); 
    }

    public function GetallProduct(): array
    {
        return $this->connection->query(
            'SELECT p.id, p.name, p.price, p.image, c.name AS category
             FROM products p JOIN categories c ON c.id = p.category_id
             ORDER BY p.id DESC'
        )->fetchAll();
    }
    public function GetProductById(int $id): ?array
    {
        $stmt = $this->connection->prepare(
            'SELECT p.id, p.name, p.price, p.image, c.name AS category
             FROM products p JOIN categories c ON c.id = p.category_id
             WHERE p.id = :id'
        );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch() ?: null;
    }
    public function updateProduct(int $id, string $name, float $price, string $image, int $categoryId): void
    {
        $stmt = $this->connection->prepare(
            'UPDATE products SET name = :name, price = :price, image = :image, category_id = :category_id WHERE id = :id'
        );
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->execute();
    }
    public function deleteProduct(int $id): void
    {
        $stmt = $this->connection->prepare('DELETE FROM products WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function addProduct(string $name, float $price, string $image, int $categoryId): void
    {
        $stmt = $this->connection->prepare(
            'INSERT INTO products (name, price, image, category_id) VALUES (:name, :price, :image, :category_id)'
        );
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->execute();
    }
}
