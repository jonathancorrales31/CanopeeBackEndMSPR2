
```md
# Canopée - Backend MSPR2

## Présentation

API backend Symfony permettant la gestion des données du site Canopée :
- prestations
- images
- textes dynamiques
- administration

## Technologies

- Symfony
- Doctrine ORM
- API Platform
- EasyAdmin
- MySQL

## Installation

Cloner le repository :

```bash
git clone https://github.com/jonathancorrales31/CanopeeBackEndMSPR2.git

Accéder au dossier :

cd CanopeeBackEndMSPR2

Installer les dépendances :

composer install
Configuration

Créer un fichier .env.local :

DATABASE_URL="mysql://user:password@127.0.0.1:3306/bddcanopee"
Base de données

Créer la base :

php bin/console doctrine:database:create

Lancer les migrations :

php bin/console doctrine:migrations:migrate

Charger les données de test :

php bin/console doctrine:fixtures:load
Lancement

Démarrer Symfony :

symfony server:start

API disponible :

http://localhost:8000/api

Administration :

http://localhost:8000/admin
Structure
src/
 ├── Entity/
 ├── Controller/
 ├── DataFixtures/
 ├── ApiResource/
 └── Repository/
