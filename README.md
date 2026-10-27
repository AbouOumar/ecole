# Billy-Ecole — Application de gestion scolaire

Projet de soutenance du **Groupe 5**. Billy-Ecole est une application web de gestion d'un établissement scolaire : élèves et parents, personnel, scolarité (classes, matières, notes, emplois du temps), finances (recettes, dépenses, salaires, trésorerie) et statistiques.

L'application est découpée en deux parties indépendantes qui communiquent par une API REST :

| Partie | Technologie | Dossier |
|---|---|---|
| Back-end (API) | Laravel 11, PHP ≥ 8.2, Laravel Sanctum | `back-end/Projet laravel/Projet laravel/Laravel_api` |
| Front-end (SPA) | Angular 18, Bootstrap 5, Chart.js | `front-end/BillyApp/BillyApp` |

## Architecture générale

```
┌──────────────────────┐   HTTP / JSON    ┌──────────────────────┐      ┌──────────────┐
│  Front-end Angular   │ ───────────────▶ │  API Laravel         │ ───▶ │ Base de      │
│  (BillyApp)          │ ◀─────────────── │  (Laravel_api)       │ ◀─── │ données SQL  │
│  http://localhost:4200│  Bearer token   │  http://127.0.0.1:8000/api │ └──────────────┘
└──────────────────────┘   (Sanctum)      └──────────────────────┘
```

- Le front appelle l'API à l'adresse définie dans `src/environments/environment.ts` (`apiUrl`).
- L'authentification se fait par `POST /api/login`. Toutes les autres routes sont protégées par `auth:sanctum`.

## Structure du dépôt

```
.
├── back-end/Projet laravel/Projet laravel/
│   ├── Laravel_api/            # API Laravel (voir ci-dessous)
│   └── dbgestionbilly.sql      # Export MySQL de la base de données
├── front-end/BillyApp/BillyApp/  # Application Angular (voir ci-dessous)
├── Document/                   # Rapport de soutenance, présentation, correction
└── README.md
```

> Les archives `.rar`, `vendor/`, `node_modules/` et les fichiers `.env` ne sont pas versionnés.

## Back-end — `Laravel_api`

```
Laravel_api/
├── app/
│   ├── Http/Controllers/
│   │   ├── gestion_eleve/        # Élèves, parents, inscriptions, paiements, reçus,
│   │   │                         #   comptes, réductions, classes, année scolaire, départs
│   │   ├── gestion_personnel/    # Personnel, fonctions, salaires
│   │   ├── gestion_scolaire/     # Matières, notes, emplois du temps, volume horaire, enseignement
│   │   ├── statistique/          # Statistiques
│   │   └── *.php                 # Absences, dépenses, types de dépenses, prévisions de recettes,
│   │                             #   comptabilité, rapports financiers, paiement des salaires,
│   │                             #   coefficients, affectations, fiches de renseignement
│   ├── Models/                   # Modèles Eloquent (Eleve, Personnel, Classe, Matiere, Payement, ...)
│   └── ClassesTransfereData/     # Classes d'aide au transfert de données
├── database/migrations/          # Schéma de la base (une migration par table)
├── routes/api.php                # Déclaration de toutes les routes de l'API
├── config/                       # Configuration Laravel
└── tests/
```

### Domaines fonctionnels de l'API

- **Authentification** : connexion, déconnexion, création et activation des utilisateurs (Sanctum).
- **Élèves & parents** : inscription / réinscription, liens parent-élève, paiements de scolarité, reçus, réductions.
- **Personnel** : fonctions, salaires, paiement des salaires, volume horaire, affectations.
- **Scolaire** : classes, effectifs, matières, coefficients, notes, emplois du temps.
- **Finances** : recettes prévisionnelles, dépenses et types de dépenses, comptabilité, rapports financiers.
- **Statistiques** : tableaux de bord.

## Front-end — `BillyApp`

```
BillyApp/src/
├── app/
│   ├── components/
│   │   ├── Authentification/         # Connexion / création de compte
│   │   ├── interface_admin/          # Espace administrateur (élèves, personnel, recettes,
│   │   │                             #   dépenses, trésorerie, notes, emplois, configuration,
│   │   │                             #   supervision, rapports, tableau de bord)
│   │   ├── interface_enseignant/     # Espace enseignant (notes, emploi du temps, élèves, salaire)
│   │   ├── interface_eleves/         # Espace élève (relevés de notes, paiements, emploi du temps)
│   │   ├── interface_Page_visiteur/  # Pages publiques
│   │   └── Users/                    # Profils
│   ├── Service/                      # Services d'accès à l'API
│   ├── models/ · Classes/            # Modèles et classes TypeScript
│   ├── Directives/ · validators/ · Filtre/
│   ├── api/                          # Définition des menus et sous-menus
│   └── app.routes.ts                 # Routage
├── environments/                     # URL de l'API, nom de l'application
└── assets/
```

Quatre espaces selon le profil : **administrateur**, **enseignant**, **élève** et **visiteur**.

## Lancement rapide avec Docker

```bash
docker compose up
```

Démarre MySQL (la base `dbgestionbilly` est importée depuis `dbgestionbilly.sql`), l'API sur http://localhost:8000/api et le front sur http://localhost:4200.

## Tests et intégration continue

```bash
cd "back-end/Projet laravel/Projet laravel/Laravel_api"
php artisan test        # SQLite en mémoire, aucune base MySQL requise
```

Le workflow `.github/workflows/ci.yml` exécute à chaque push : les tests Laravel (PHP 8.2) et le build Angular (Node 20).

## Installation manuelle

### Prérequis

PHP ≥ 8.2, Composer, Node.js et npm, un serveur de base de données (MySQL/MariaDB ou SQLite).

### 1. Back-end

```bash
cd "back-end/Projet laravel/Projet laravel/Laravel_api"
composer install
cp .env.example .env
php artisan key:generate
```

Configurez la base de données dans `.env`, puis créez les tables :

```bash
php artisan migrate
```

Ou importez directement `back-end/Projet laravel/Projet laravel/dbgestionbilly.sql` dans MySQL (phpMyAdmin).

Lancez l'API :

```bash
php artisan serve        # http://127.0.0.1:8000
```

### 2. Front-end

```bash
cd front-end/BillyApp/BillyApp
npm install
npm start                # http://localhost:4200
```

Si l'API n'est pas sur `http://127.0.0.1:8000/api`, modifiez `apiUrl` dans `src/environments/environment.ts`.

## Documentation

Le rapport et la présentation de soutenance se trouvent dans le dossier `Document/`.
