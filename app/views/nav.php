<?php
use App\Controllers\CartController;
use App\Controllers\AuthController;
?>

<nav>
    <ul>
        <?php if (!AuthController::isLogged()) :?>
            <li><a href="/register">Inscription</a></li>
            <li><a href="/login">Connexion</a></li>
        <?php else :?>
            <li><a href="/products">Produits</a></li>
            <li><a href="/cart">Panier (<?php CartController::count(); ?>)</a></li>
            <li><a href="/logout">Déconnexion</a></li>
        <?php endif; ?>
    </ul>
</nav>