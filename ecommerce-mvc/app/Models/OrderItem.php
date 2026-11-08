<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

/** TODO: Implement OrderItem for the e-commerce project. */
final class OrderItem
{
        private Database $database;
        private PDO $connection;

        public function __construct()
        {




                $this->database = new Database();
                $this->connection = $this->database->connect();
        }
        public function updateQuantity(
                int $orderItemId,
                int $quantity
        ): void {
                $query = "UPDATE order_items
              SET
                  quantity = :quantity,
                  subtotal = quantity * 0 + :quantity * unit_price
              WHERE id = :id";

                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                $stmt->bindParam(':id', $orderItemId, PDO::PARAM_INT);

                $stmt->execute();
        }

        public function addNewOrderItem(
                int $orderId,
                int $productId,
                string $productName,
                int $quantity,
                float $unitPrice
        ): void {
                $subtotal = $quantity * $unitPrice;

                $query = "INSERT INTO order_items
              (
                  order_id,
                  product_id,
                  product_name,
                  quantity,
                  unit_price,
                  subtotal
              )
              VALUES
              (
                  :order_id,
                  :product_id,
                  :product_name,
                  :quantity,
                  :unit_price,
                  :subtotal
              )";

                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
                $stmt->bindParam(':product_name', $productName);
                $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                $stmt->bindParam(':unit_price', $unitPrice);
                $stmt->bindParam(':subtotal', $subtotal);

                $stmt->execute();
        }
}
