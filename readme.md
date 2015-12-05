comptes : 

login : test
mdp : test


les commandes à run pour les assets:

décommenter la ligne dans le fichier php.ini de apache (pour l'upload d'images)
extension=php_fileinfo.dll

php app/console assets:install web/
php app/console assetic:dump --env=prod --no-debug
