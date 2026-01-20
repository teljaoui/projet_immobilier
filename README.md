# Application Web Agence Immobilière - CodeIgniter 4

## À propos

Cette application web permet de **gérer et promouvoir des biens immobiliers**.

* Interface **visiteur** : consulter et rechercher des annonces, créer un compte client.
* Espace **administrateur** : gérer les biens, photos et contenus.
* Développée avec **CodeIgniter 4** et **MySQL**.

---

## Prérequis

* PHP ≥ 8.1

---

## Installation rapide

1. **Cloner le projet**

```bash
git clone <url_du_projet>
cd <nom_du_dossier>
```

2. **Installer les dépendances**

```bash
composer install
```

3. **Configurer l’environnement**

* Copier `.env.example` en `.env` et modifier :

```env
database.default.hostname = localhost
database.default.database = nom_de_votre_base
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

4. **Créer la base de données**

* Avec phpMyAdmin ou un autre outil, créer la base indiquée dans `.env`.

5. **Lancer les migrations**

```bash
php spark migrate
```

6. **Exécuter le seeder de test**

```bash
php spark db:seed MainSeeder
```

> Le seeder `MainSeeder` crée un compte administrateur et insère des données de test (biens, types, villes, etc.) pour permettre de tester l’application immédiatement.

---

## Accès comptes de test

* **Administrateur** :

  * Email : `admin@immobilier.com`
  * Mot de passe : `admin123`

* **Client** : possibilité de créer un compte directement depuis la plateforme.


## Lancer l’application

1. Démarrer le serveur intégré de CodeIgniter depuis le terminal à la racine du projet :

```bash
php spark serve
```

2. Ouvrir le navigateur et accéder à l’application :

```
http://localhost:8080
```
