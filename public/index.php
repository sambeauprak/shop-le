<?php

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('APP', dirname(__DIR__) . '/app');

use Core\Router;
use App\Controllers\AuthController;
use App\Controllers\ProductController;
use App\Controllers\CartController;

require_once APP . '/views/nav.php';

// Routes
Router::add('/login', [AuthController::class, 'loginPage']);
Router::add('/login-submit', [AuthController::class, 'login']);
Router::add('/logout', [AuthController::class, 'logout']);
Router::add('/products', [ProductController::class, 'productList']);
Router::add('/cart', [CartController::class, 'viewCart']);
Router::add('/add-to-cart', [CartController::class, 'addToCart']);
Router::add('/remove-from-cart', [CartController::class, 'removeFromCart']);

Router::add('/register', [AuthController::class, 'registerPage']);
Router::add('/register-submit', [AuthController::class, 'register']);

// Dispatcher
Router::dispatch($_SERVER['REQUEST_URI']);

