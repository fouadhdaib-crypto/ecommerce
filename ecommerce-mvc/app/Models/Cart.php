<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

final class Cart
{
    private Database $database;
    private PDO $connection;

    public function __construct()
    {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }


   
    public function createCart(int $userId): int
    {
        $query = "INSERT INTO carts (user_id)
                  VALUES (:user_id)";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);

         $stmt->execute();

         return (int) $this->connection->lastInsertId();
    }


    public function getCartTotal(int $cartId): float
    {
        $query = "SELECT COALESCE(
                      SUM(p.price * ci.quantity), 0
                  ) AS total_price
                  FROM cart_items ci
                  JOIN products p ON ci.product_id = p.id
                  WHERE ci.cart_id = :cart_id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':cart_id', $cartId, PDO::PARAM_INT);

        $stmt->execute();

        return (float) $stmt->fetchColumn();
    }


 public function addCartItem(
    int $cartId,
    int $productId,
    int $quantity = 1
): bool {
    if ($cartId <= 0 || $productId <= 0 || $quantity <= 0) {
        return false;
    }

    $query = "INSERT INTO cart_items (cart_id, product_id, quantity)
              VALUES (:cart_id, :product_id, :quantity)";

    $stmt = $this->connection->prepare($query);

    $stmt->bindValue(':cart_id', $cartId, PDO::PARAM_INT);
    $stmt->bindValue(':product_id', $productId, PDO::PARAM_INT);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);

    if (!$stmt->execute()) {
        return false;
    }

    return $stmt->rowCount() === 1;
}



    public function updateQuantity(
        int $cartItemId,
        int $quantity
    ): bool {
        if ($quantity <= 0) {
            return false;
        }

        $query = "UPDATE cart_items
                  SET quantity = :quantity
                  WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindValue(':id', $cartItemId, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function deleteCartItem(int $cartItemId): bool
    {
        $query = "DELETE FROM cart_items
                  WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':id', $cartItemId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getCartItems(int $cartId): array
    {
        $query = "SELECT
                  ci.id,
                  ci.cart_id,
                  ci.product_id,
                  ci.quantity,
                  p.name AS product_name,
                  p.price,
                  p.image,
                  (p.price * ci.quantity) AS subtotal
              FROM cart_items ci
              JOIN products p ON ci.product_id = p.id
              WHERE ci.cart_id = :cart_id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':cart_id', $cartId, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


   

    public function getCartIdByUserId(int $userId): ?int
{
    $query = "SELECT id FROM carts WHERE user_id = :user_id LIMIT 1";

    $stmt = $this->connection->prepare($query);
    $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $cartId = $stmt->fetchColumn();

    return $cartId !== false ? (int) $cartId : 0;
}
}
