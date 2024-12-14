<?php

namespace App\Controllers;

use App\Models\Product;
use App\Controllers\AuthController;


class ProductController {
    public static function productList() {
        if (AuthController::isLogged() === false) {
            header('Location: /login');
            exit;
        }
        $products = Product::getAll();
        require_once APP . '/views/products.php';
    }
}
