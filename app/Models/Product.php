<?php

namespace App\Models;

use Core\Database;

class Product {
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM products");
        return $stmt->fetchAll();
    }
}
