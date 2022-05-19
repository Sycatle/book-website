<?php

/* -- Future optimisation du routeur. --

require('./src/controllers/Router.php');
$router = new \sycatle\beblio\Router(
    $_GET['r'] != null || $_GET['r'] != "" ? 
        $_GET['r'] 
    :
        'main'
); */


// -- Routeur actuel, à optimiser !


if (isset($_GET['r'])) {
    $getter = $_GET['r'];
    switch ($getter){
        case 'connect':
            require("./src/controllers/ConnectController.php");
            exit();
        case 'explore':
            require("./src/controllers/ExploreController.php");
            exit();
        case 'post':
            require("./src/controllers/PostController.php");
            exit();
        case 'library':
            require("./src/controllers/LibraryController.php");
            exit();
        case 'settings':
            require("./src/controllers/SettingsController.php");
            exit();
        case 'admin':
            require("./src/controllers/AdminController.php");
            exit();
        case 'disconnect':
            require("./src/controllers/DisconnectController.php");
            exit();
        default:
            header("Location: ./?error=404");
            exit();
    }

/* à OPTIMISER AUSSI.*/

} else if (isset($_GET["book"])) {
    require("./src/controllers/BookController.php");
} else if (isset($_GET["author"])) {
    require("./src/controllers/AuthorController.php");
} else if (isset($_GET["quote"])) {
    require("./src/controllers/QuoteController.php");
} else if (isset($_GET["category"])) {
    require("./src/controllers/CategoryController.php");
} else if (isset($_GET["user"])) {
    require("./src/controllers/UserController.php");
} else if (isset($_GET["admin"])) {
    require("./src/controllers/AdminController.php");
} else if (isset($_GET["error"])) {
    require("./src/controllers/ErrorController.php");
} else {
    require("./src/controllers/HomeController.php"); 
}



/* -- ANCIEN ROUTEUR TRèS MOCHE

    if ($_GET["r"] == "connect") { // Appelle le contrôleur "Connect" afin d'afficher la page à l'utilisateur.
        require("./src/controllers/ConnectController.php");
    } else if ($_GET["r"] == "explore") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/controllers/ExploreController.php");
    } else if ($_GET["r"] == "post") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/controllers/PostController.php");
    } else if ($_GET["r"] == "library") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/controllers/LibraryController.php");
    } else if ($_GET["r"] == "settings") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/controllers/SettingsController.php");
    } else if ($_GET["r"] == "admin") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/controllers/AdminController.php");
    } else if ($_GET["r"] == "disconnect") { // Appelle le contrôleur "Disconnect" afin de deconnecter page à l'utilisateur.
        require("./src/controllers/DisconnectController.php");    
    }
*/