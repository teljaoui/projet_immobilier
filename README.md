Application Web Agence Immobilière - CodeIgniter 4
À propos

Cette application web permet de gérer et promouvoir des biens immobiliers.

Interface visiteur : consulter et rechercher des annonces, créer un compte client.

Espace administrateur : gérer les biens, photos et contenus.

Développée avec CodeIgniter 4 et MySQL.

Prérequis

PHP ≥ 8.1

Installation rapide

Cloner le projet

git clone <url_du_projet>
cd <nom_du_dossier>


Installer les dépendances

composer install


Configurer l’environnement

Copier .env.example en .env et modifier :

app.baseURL = 'http://localhost/<nom_du_projet>/public'
database.default.hostname = localhost
database.default.database = nom_de_votre_base
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi


Créer la base de données

Avec phpMyAdmin ou un autre outil, créer la base indiquée dans .env.

Lancer les migrations

php spark migrate


Exécuter le seeder de test

php spark db:seed MainSeeder


Le seeder crée un compte administrateur pour tester l’accès.

Accès comptes de test

Administrateur :

Email : admin@immobilier.com

Mot de passe : admin123

Client : possibilité de créer un compte directement depuis la plateforme.

Lancer l’application

Configurer le serveur web pour pointer vers le dossier public.

Accéder au projet via navigateur :

http://localhost/<nom_du_projet>/public


