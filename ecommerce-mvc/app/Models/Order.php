<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

/** TODO: Implement Order for the e-commerce project. */
final class Order
{
        private Database $database;
        private PDO $connection;

        public function __construct()
        {




                $this->database = new Database();
                $this->connection = $this->database->connect();
        }

        public function GetallOrder(): array
        {
                return $this->connection->query(
                        'SELECT o.id, o.user_id, o.total_amount, o.status, o.created_at, u.name AS user_name
             FROM orders o JOIN users u ON u.id = o.user_id
             ORDER BY o.id DESC'
                )->fetchAll(PDO::FETCH_ASSOC);
        }
        public function GetOrderById(int $id): ?array
        {
                $stmt = $this->connection->prepare(
                        'SELECT o.id, o.user_id, o.total_amount, o.status, o.created_at, u.name AS user_name
             FROM orders o JOIN users u ON u.id = o.user_id
             WHERE o.id = :id'
                );
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        }
        public function updateOrder(int $id, string $status): void
        {
                $stmt = $this->connection->prepare(
                        'UPDATE orders SET status = :status WHERE id = :id'
                );
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':status', $status);
                $stmt->execute();
        }
        public function addNewOrder(
                int $userId,
                float $totalAmount,
                string $status,
                string $paymentStatus,
                string $paymentMethod,
                string $shippingAddress
        ): int {
                $query = "INSERT INTO orders
              (
                  user_id,
                  total_amount,
                  status,
                  payment_status,
                  payment_method,
                  shipping_address
              )
              VALUES
              (
                  :user_id,
                  :total_amount,
                  :status,
                  :payment_status,
                  :payment_method,
                  :shipping_address
              )";

                $stmt = $this->connection->prepare($query);

                $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
                $stmt->bindValue(':total_amount', $totalAmount);
                $stmt->bindValue(':status', $status);
                $stmt->bindValue(':payment_status', $paymentStatus);
                $stmt->bindValue(':payment_method', $paymentMethod);
                $stmt->bindValue(':shipping_address', $shippingAddress);

                $stmt->execute();

                return (int) $this->connection->lastInsertId();
        }


        
}
