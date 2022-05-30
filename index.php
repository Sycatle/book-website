<?php

/*
    ----------------------------------------------------------------------

    Object : Application's Entry (index.php)
           redirecting to requested controllers

    Author: Sycatle
    Creation Date: 1st April 2022
    Last Update: 23rd May 2022
    Changelogs:
        - Optimize performance.
    To-do:
        - Create a strong Router.

    ----------------------------------------------------------------------
*/

// use sycatle\beblio\Manager;
// use sycatle\beblio\controllers\AdminController;
// use sycatle\beblio\controllers\ConnectController;
// use sycatle\beblio\controllers\HomeController;

/* ROUTEUR ACTUEL:
- Récupère la requête de l'utilisateur avec la variable 'r' en GET.
- Fonctionne mais n'est pas le plus optimisé en terme de routeur.
*/

if (isset($_GET['r'])) {
    $getter = $_GET['r'];
    switch ($getter){
        // Modules Pages
        case 'home': require("./src/controllers/HomeController.php"); /* new HomeController(); */ exit(); 
        case 'connect': require("./src/controllers/ConnectController.php"); /*new ConnectController();*/ exit();
        case 'disconnect': require("./src/controllers/DisconnectController.php");exit();
        case 'explore': require("./src/controllers/ExploreController.php");exit();
        case 'post': require("./src/controllers/PostController.php");exit();
        case 'library': require("./src/controllers/LibraryController.php");exit();
        case 'settings' :require("./src/controllers/SettingsController.php");exit();
        // Contents Pages
        case 'book': require("./src/controllers/BookController.php");exit();
        case 'author': require("./src/controllers/AuthorController.php");exit();
        case 'quote': require("./src/controllers/QuoteController.php");exit();
        case 'category': require("./src/controllers/CategoryController.php");exit();
        // Other
        case 'error': require("./src/controllers/ErrorController.php");exit();
        case 'admin': require("./src/controllers/AdminController.php"); /*new AdminController();*/ exit();
        // Redirect to 404 page if not found
        default: header("Location: ./?error=404");exit();
    }
} else {
    // Redirect to main page if no request specified
    require("./src/controllers/HomeController.php"); 
    /* new HomeController(); */
}

/* -- Futur routeur. (bebl.io/books/id, etc..) -- */

/* require('vendor/autoload.php');

$router = new \App\Router\Router($_GET['url']);

$router->get('/', function(){ echo("Homepage"); });
$router->get('/books', function(){ echo("Liste des livres"); });

$router->get('/books/:id-:slug', function($id, $slug) use ($router){ 
    echo $router->url('books.show', ['id' => 1, 'slug' => 'salut-les-gens']);
}); //'books.show')->with('id', '[0-9]+', '')->with('slug', '[a-z\-]+');

$router->post('/books/:id', function($id){ echo('Poster pour le livre n°' . $id); });

$router->run(); */