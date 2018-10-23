# Conception de framework

Document de conception de framework MVC. Structure d'un environnement de base pour le développement d'une application qui répond à une architecture MVC.

BLUE POTATOE FRAMEWORK

<!-- TOC -->

- [Conception de framework](#conception-de-framework)
    - [Recommandantions du professeur](#recommandantions-du-professeur)
    - [Utilitaires](#utilitaires)
    - [Directory structure](#directory-structure)
    - [MVC diagram](#mvc-diagram)
    - [Fonctionnement](#fonctionnement)
        - [CORE](#core)
        - [CONTROLLER](#controller)
        - [MODEL](#model)
        - [VIEW](#view)
    - [Styles et JS](#styles-et-js)
    - [Database](#database)
    - [Templating](#templating)

<!-- /TOC -->

## Recommandantions du professeur

Checklist:

- Architecture du directory
- Dossier contenant les sources statiques
- Connexion aux bases de données (ORM)
- Liste de pré-requis de l'architecture (LESS, BLADE, ORM)
- En dev :
  - Logiques de compilations en cas de sources compilables
  - Logique de minification des sources
- En prod :
  - Logiques de compilation en cas de sources compilables
  - Logique de minification des sources

## Utilitaires

- Node.js >= 8
  - grunt
  - grunt-contrib-concat
  - grunt-contrib-uglify
  - grunt-sass
- Composer
  - gabordemooij/redbean
  - twig/twig
  - Autoload

## Directory structure

- Core
  - `Controller.php`: COntient les logiques de base des controlleurs
  - `Model.php`: Contient les logiques de base des Modèles
  - `View.php`: Contient les logiques de base pour charger les vues, interprêter les templates.
  - `Router.php`: Logiques de routage
- Controllers
  - Contient les controllers, suffixe `Controller.php`
  - Sous dossiers pour séparer les logiques (Correspondance vues)
- Views
  - resources
    - css
    - js
    - img
  - Sous dossiers par logiques
    - layouts
    - partial
    - `nomdevue.suffixe.php`
- Models
  - `CamelCaseModelName.php`
- public
  - `index.php`
  - css
  - js

## MVC diagram

       Database
    +-------------+               +--------------+
    |    MODEL    |               |     VIEW     |
    +------+------+               +--------------+
        ^  |    +--------------+        ^
        |  +---->              |        |
        |       |  CONTROLLER  +--------+
        +-------+              |
                +---^------+---+
                    |      |
                +---+------v---+
                |    ROUTER    |
                +--------------+

## Fonctionnement

### CORE

- Connexion à la base de donnée (Héritage pour MODEL)
- Router: Lit l'url entrée et charge le bon controller
- ViewLoader: Charge une vue et l'affiche

### CONTROLLER

Contient la logique du code de l'application.

- Est notifié des actions de l'utilisateur.
- Il est chargé du transfert des données entre les _MODELS_ et les _VUES_.
- Il peut être chargé d'intervenir sur les données avant de les envoyer soit vers une vue, soit vers la base de donnée.
- Il contient les décisions à prendre dans les cas que l'application peut rencontrer.

### MODEL

Intéragit et renvoie des données.

- Etablit et maintient une connexion à la base de donnée.
- Donne un nom aux données présentes en DB.
- Interroge la base de données (Lecture d'un élément, de plusieurs éléments, lcture selon certaines conditions/filtres...)
- Modifie la base de données (Effacer un élément, modifier un élément)
- Assure que l'entrée des données est conforme.

### VIEW

La vue fait interface entre le programme et l'utilisateur.

- Reçoit les actions de l'utilisateur
- Gere le templating (Layouts, vues partielles)
- Mixe HTML et PHP (Et est la seule EVER à pouvoir faire ça).

## Styles et JS

Less et js, avant compilation, sont dans le dossier `/views/resources/{js,css}`. Compilation des assets avec Grunt.

Tâches grunt:

- concat: Bundle le js
- sass: Compile le sass en css
- min:
  - js: Minifie le js
  - css: Minifie le css
  - img: Minifie les images
  - -> Copie tout ça dans le dossier `/public/{js,css,img}`
- watch: concat, sass, min.

## Database

Implémentation de [RedBeanPHP](https://www.redbeanphp.com/) pour s'occuper des données.

DB: `mysql-server`.

## Templating

[Twig](https://twig.symfony.com/)