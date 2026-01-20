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
app.baseURL = 'http://localhost/<nom_du_projet>/public'
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

> Le seeder crée un compte administrateur pour tester l’accès.

---

## Accès comptes de test

* **Administrateur** :

  * Email : `admin@immobilier.com`
  * Mot de passe : `admin123`

* **Client** : possibilité de créer un compte directement depuis la plateforme.

---

## Lancer l’application

1. Configurer le serveur web pour **pointer vers le dossier `public`**.
2. Accéder au projet via navigateur :

```
http://localhost/<nom_du_projet>/public
```

