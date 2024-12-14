<h1>Mon Panier</h1>
<?php foreach ($cartItems as $item): ?>
    <p>Produit ID : <?= $item->product_id ?> - Quantité : <?= $item->quantity ?></p>
    <form action="/remove-from-cart" method="post">
        <input type="hidden" name="id" value="<?= $item->id ?>">
        <button type="submit">Supprimer</button>
    </form>
<?php endforeach; ?>

<a href="/products">Retour aux produits</a>