# Unedic Test

#### Requirements

* PHP 7.*
* MySQL

#### Installation

1 - Cloner le projet
```bash
git clone https://github.com/HamidiMehdi/unedic.git
```

2 - Télécharger les composants
```bash
composer install
```

3 - Ajouter vos données accès à votre base de données MySQL dans le fichier env
```bash
DATABASE_URL=mysql://root:12345@127.0.0.1:3306/unedic
```

4 - Créer une base de données nommé unedic
```bash
create database unedic
```

5 - Lancer les migrations
```bash
php bin/console doctrine:migrations:migrate
```

6 - Lancer le serveur symfony
```bash
php bin/console run:server
```

#### Informations

Chaque niveau correspond à une branche :
* niveau 1 correspond à la branch "student"
* niveau 2 correspond à la branch "bootstrap"
* niveau 3 correspond à la branch "department"
* niveau 4 correspond à la branch "api"

Toutes ces branches ont été regroupées sur la branche master.