
## Creation de projet avec laravel-10
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### Installer XAMPP (pour installer PHP et MySQL)
- php -v (PHP 8.2.12) 
- Base de donnée MySQL
### Installer Composer
### Vérifierl’installation de Composer
- composer --version
### Installer Laravel à l’aide de Composer
- composer create-project laravel/laravel application-crud
### Vérifier l’installation de Laravel
- laravel --version
### Démarrez le serveur
- php artisan serve
### Lancement de projet 
- php artisan serve //loacalhost 8000

## Ajouter un client dans une base de données avec Laravel:

### Créer un modèle (Model) pour le client & une migration pour ajouter la table de clients à le base de données.
- php artisan make:model client -m
- modifier le schéma client et le fichier client au niveau de dossier model 
- php artisan migrate 
### Créer un contrôleur (Controller) pour gérer les actions liées aux clients.
- php artisan make:controller clientsController --resource
- Créer une vue pour ajouter un nouveau client.

### Afficher la liste des  clients éxistant déjçà dans la base de donnée:
- Récupérer les données dans le contrôleur 
- Créer une vue pour afficher un nouveau client.

## LES ROUTES 

##  Gestion d'image 
Stockage du chemin de l'image dans la base de données 

