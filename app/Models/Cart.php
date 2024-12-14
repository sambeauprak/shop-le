<?php

namespace App\Models;

use Core\Database;

class Cart
{
    public static function getByUserId($userId)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM carts WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Models\Cart');
        return $stmt->fetchAll();
    }

    public static function add($userId, $productId, $quantity)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO carts (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);
    }

    public static function remove($userId, $id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM carts WHERE user_id = :user_id AND id = :id");
        $stmt->execute(['user_id' => $userId, 'id' => $id]);
    }

    public static function count()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            return 0;
        }

        $db = Database::connect();
        $stmt = $db->prepare("SELECT COUNT(*) FROM carts WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchColumn();
    }
}
