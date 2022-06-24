<?php

/*
    ----------------------------------------------------------------------

    Object : Application's Entry (index.php)
           redirecting to requested controllers

    Author: Sycatle
    Creation Date: 1st April 2022
    Last Update: 20th May 2022
    Changelogs:
        - Setting up a basic Router.
    To-do:
        - Create a strong Router.

    ----------------------------------------------------------------------
*/

/* -- Nouveau routeur. -- */
/* require('vendor/autoload.php');

$router = new \App\Router\Router($_GET['url']);

$router->get('/', function(){ echo("Homepage"); });
$router->get('/books', function(){ echo("Liste des livres"); });

$router->get('/books/:id-:slug', function($id, $slug) use ($router){ 
    echo $router->url('books.show', ['id' => 1, 'slug' => 'salut-les-gens']);
}); //'books.show')->with('id', '[0-9]+', '')->with('slug', '[a-z\-]+');

$router->post('/books/:id', function($id){ echo('Poster pour le livre n°' . $id); });

$router->run(); */

/* ROUTEUR ACTUEL:
- Récupère la requête de l'utilisateur avec la variable 'r' en GET.
- Fonctionne mais n'est pas le plus optimisé en terme de routeur.
*/
use sycatle\beblio\entities\User;

$user = isset($_SESSION['id']) ? new User($_SESSION['id']) : null;

if (isset($_GET['r'])) {
    $getter = $_GET['r'];
    switch ($getter) {
        case 'home': require("./src/controllers/HomeController.php"); exit();
        case 'connect': require("./src/controllers/ConnectController.php"); exit();
        case 'explore': require("./src/controllers/ExploreController.php"); exit();
        case 'post': require("./src/controllers/PostController.php");exit();
        case 'library': require("./src/controllers/LibraryController.php");exit();
        case 'settings': require("./src/controllers/SettingsController.php");exit();
        case 'admin': require("./src/controllers/AdminController.php");exit();
        case 'disconnect': require("./src/controllers/DisconnectController.php");exit();

        // Contents Pages
        case 'book': require("./src/controllers/BookController.php");exit();
        case 'author': require("./src/controllers/AuthorController.php");exit();
        case 'quote': require("./src/controllers/QuoteController.php");exit();
        case 'gender': require("./src/controllers/GenderController.php");exit();
        case 'error': require("./src/controllers/ErrorController.php");exit();
        default: header("Location: ./?error=404");exit();
    }
} else {
    require("./src/controllers/HomeController.php");
}