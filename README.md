# Shop-le !

Shope-le est un mini-framework à des fins d'apprentissage au PHP.
Il permet d'avoir une couche e-commerce rapidement avec un système d'authentification, de panier et la gestion de produits.

## Installation pour débutants

1. **Cloner le dépôt** :

2. **Installer les dépendances avec Composer** :

   ```bash
   composer install
   ```

3. **Configurer les variables d'environnement** :

   - Créez un fichier `.env` à la racine du projet.
   - Ajoutez-y les variables nécessaires (voir `.env.example` pour un exemple).

4. **Initialiser la base de données** :

   - Pour initialiser la base de données, lancer la commande suivante :

   ```bash
   php init.php
   ```

5. **Lancer le serveur PHP** :

   ```bash
   php -S localhost:8000 -t public
   ```

6. **Accéder à l'application** :
   - Ouvrez votre navigateur et allez à l'adresse [http://localhost:8000](http://localhost:8000).
