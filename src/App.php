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

if (isset($_GET['r'])) {
    $getter = $_GET['r'];
    switch ($getter) {
        case 'admin': require("controllers/AdminController.php");exit();

        case 'login': require("controllers/LoginController.php"); exit();
        case 'signup': require("controllers/SignUpController.php"); exit();
        case 'logout': require("controllers/LogoutController.php");exit();

        case 'explore': require("controllers/ExploreController.php"); exit();
        case 'post': require("controllers/PostController.php");exit();
        case 'library': require("controllers/LibraryController.php");exit();
        case 'settings': require("controllers/SettingsController.php");exit();

        // Contents Pages
        case 'book': require("controllers/BookController.php");exit();
        case 'author': require("controllers/AuthorController.php");exit();
        case 'quote': require("controllers/QuoteController.php");exit();
        case 'gender': require("controllers/GenderController.php");exit();

        case 'error': require("controllers/ErrorController.php");exit();
        default: header("Location: ./?error=404");exit();
    }
} else {
    require("controllers/HomeController.php");
}