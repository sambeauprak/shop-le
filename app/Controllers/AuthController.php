<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    public static function isLogged() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

    public static function loginPage() {
        if (self::isLogged() === true) {
            header('Location: /products');
            exit;
        }
        require_once APP . '/views/login.php';
    }

    public static function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('Location: /products');
        } else {
            echo "Identifiants incorrects.";
        }
    }

    public static function registerPage() {
        if (self::isLogged()) {
            header('Location: /products');
            exit;
        }
        require_once APP . '/views/register.php';
    }

    public static function register() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['password_confirm'];

        // Validation des données
        if ($password !== $passwordConfirm) {
            echo "Les mots de passe ne correspondent pas.";
            return;
        }

        if (User::findByEmail($email)) {
            echo "Cet email est déjà utilisé.";
            return;
        }

        // Création de l'utilisateur
        User::create($email, password_hash($password, PASSWORD_BCRYPT));
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
    }

    public static function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: /login');
    }
}
