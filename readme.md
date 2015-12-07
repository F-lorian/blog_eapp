# membres du groupe #
- Samuel Fobis
- Florian Masip

# compte de test #
- login : test
- mot de passe : test

# installation #

- Bundles : FOSUserBundle
- commandes à run pour les assets:
php app/console assets:install web/
php app/console assetic:dump --env=prod --no-debug

- décommenter la ligne dans le fichier php.ini de apache (pour l'upload d'images)
extension=php_fileinfo.dll

- base de données : /blog.sql

# commentaires #
Le bundle est un créateur de blogs. Une fois le compte utilisateur créé, celui ci peu créer un ou plusieurs blog 
et y ajouter/éditer des posts et des catégories. La page d'accueil présente les derniers blogs créés.

# Appréciations sur le cours #

- Positif :

Bonne progression dans la partie sur symfony, prof sympa et de bons conseils.

- Negatif :

Première partie du cours sur HTML/CSS/PHP un peu trop longue.