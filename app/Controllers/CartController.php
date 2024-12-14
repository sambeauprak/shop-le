<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Controllers\AuthController;

class CartController {
    public static function viewCart() {
        if (AuthController::isLogged() === false) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $cartItems = Cart::getByUserId($userId);
        require_once APP . '/views/cart.php';
    }

    public static function addToCart() {
        if (AuthController::isLogged() === false) {
            header('Location: /login');
            exit;
        }
        $userId = $_SESSION['user_id'];

        $productId = $_POST['product_id'];
        Cart::add($userId, $productId, 1);
        header('Location: /cart');
    }

    public static function removeFromCart() {
        if (AuthController::isLogged() === false) {
            header('Location: /login');
            exit;
        }
        $userId = $_SESSION['user_id'];

        $id = $_POST['id'];
        Cart::remove($userId, $id);
        header('Location: /cart');
    }
    
    public static function count() {
        echo Cart::count();
    }
}
