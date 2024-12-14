<h1>Produits</h1>
<?php foreach ($products as $product): ?>
    <div>
        <h2><?= $product['name'] ?></h2>
        <p><?= $product['description'] ?></p>
        <p><?= $product['price'] ?> €</p>
        <form method="POST" action="/add-to-cart">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
            <button type="submit">Ajouter au panier</button>
        </form>
    </div>
<?php endforeach; ?>

<a href="/cart">Voir mon panier</a>
