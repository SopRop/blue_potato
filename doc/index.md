# Blue Potato

![blue potato](./res/bluepotato.png)

[Blue Potato](https://github.com/soprop/blue_potato/tree/dev), un framework MVC léger, léger, et léger, implémentant [Twig](https://twig.symfony.com/doc/2.x/) et [RedBeanORM](https://www.redbeanphp.com/index.php).

- [SopRop](github.com/soprop)
- [Leamundis](github.com/leamundis)
- [QuentinB](github.com/quentinbouvier)

## Table des matières

<!-- TOC -->

- [Blue Potato](#blue-potato)
    - [Table des matières](#table-des-matières)
    - [Get Started](#get-started)
        - [Requirements](#requirements)
        - [Setup](#setup)
    - [Framework](#framework)
        - [Routing](#routing)
        - [Controllers](#controllers)
        - [Models](#models)
        - [Config](#config)
    - [Front end](#front-end)

<!-- /TOC -->

## Get Started

### Requirements

- Server
  - php >=7.0
    - php-mbstring
    - composer
      - Packages:
        - Twig/Twig
        - gabordemooij/redbean
        - vlucas/dotenv
  - mysql-server
- Front
  - Node >= 8
    - Grunt >= 1.0.3

### Setup

__Clonez__ Blue Potato depuis le [repo github](https://github.com/SopRop/blue_potato)

La branche _master_ pour une expérience stable. La branche _dev_ pour une expérience instable. La branche _sample_ pour un exemple simple d'utilisation.

Copier le `.env.example` en `.env` à la racine du projet, renseigner les infos pour la base de données

## Framework

### Routing

Blue Potato utilise un système de routes automatiques en interprêtant l'url entrée par l'utilisateur. `http://mywebsite.com/Home/Index` appellera automatiquement la méthode `index()` du controller `HomeController`. Notez que `Home/Index`est la route par défaut, qui sera chargée si aucune route n'est demandée par l'utilisateur.

![route exemple](./res/route_example.png)

### Controllers

Les controllers sont le nerfs de la guerre. Ils sont appelés via le premier segment de la route : `/Home` appelera `HomeController`. Le second segment de la route appellera la méthode du controller ci-choisi : `Home/Index` Appellera `Controller\HomeController->index()`.

Les controllers héritent de `\Core\Controller`.

![homecontroller example](./res/homecontroller_example.png)

Conventions:

- Le controller doit commencer par une Majuscule, et est appelé via un `ucfirst()`. => _HomeController_, _DuckHuntersController_
- Les controllers sont suffixés par __Controller__. => _HomeController_, _UsersController_
- Les actions sont appelées en lowerCamelCase (via `lcfirst()`). Les méthodes du controller doivent être écrites de manière à concorder avec la fonction (à l'exception du premier caractère qui est case INsensitive).

### Models

Les _model_ héritent de `\Core\Model`.

Par défaut, le nom du _model_ correspond à une table éponyme dans la base de données.

pour changer le nom de la table, ajouter un `protected $table = "table_name";` au _model_.

![model example](./res/model_example.png)

Chaque fonction est appelée de manière statique via le nom du modèle. _`ModelName::getAll()`_

Fonctions:

- getAll()
- getByProperty($column, $value) => Effectue une recherche via `LIKE` dans la table
- getByID($id)
- numberOf() => `COUNT`

### Config

`env($name, $default)` pour charger un paramètre depuis le .env avec une valeur par défaut.

Pour plus de classe, renseigner les settings dans `/config/main.php`, en y accédant ensuite via `conf($name)` dans le projet.

![Conf and env](./res/env_and_conf.png)

## Front end

Blue Potato bundle et minifie votre JS et votre SASS depuis les dossiers `Views/resources/{css,js}` vers `public/{css,js}`.

Chargez vos ressources dans vos vues depuis la route la plus simple :

```html
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<script type="text/javascript" src="js/built.min.js"></script>
```

Pour cela, toute une gamme de tâches grunt, et un watch incroyable de puissance.

> *__WARNING__: Si vous travaillez avec Vagrant, les tâches grunt doivent être lancées depuis l'host. le package `grunt-contrib-watch` rencontre des erreurs dans un environnement virtualisé.*

Installez `grunt-cli`

```shell
npm install grunt-cli --global
```

Installez vos dépendances node :

```shell
cd /Path/to/blue_potato/project/root
npm install
```

Lancez vos tâches :

```shell
grunt dev # Compile le sass et exporte le css. Concat et minifie le js. Copie les assets dans le dossier public
grunt # Comme dev, plus un watch de ouf
```
