<?php

/* -- Future optimisation du routeur. --

require('./src/Router.php');
$router = new \sycatle\beblio\Router(
    $_GET['r'] != null || $_GET['r'] != "" ? 
        $_GET['r'] 
    :
        'main'
); */

// -- Routeur actuel, à optimiser !

$getter_r = $_GET['r'];
if (isset($getter_r)) {
    switch ($getter_r){
        case 'connect':
            require("./src/ConnectController.php");
            exit();
        case 'explore':
            require("./src/ExploreController.php");
            exit();
        case 'post':
            require("./src/PostController.php");
            exit();
        case 'library':
            require("./src/PostController.php");
            exit();
        case 'settings':
            require("./src/SettingsController.php");
            exit();
        case 'admin':
            require("./src/AdminController.php");
            exit();
        case 'disconnect':
            require("./src/DisconnectController.php");
            exit();
        default:
            header("Location: ./?error=404");
            exit();
    }

/* à OPTIMISER AUSSI.*/

} else if (isset($_GET["book"])) {
    require("./src/BookController.php");
} else if (isset($_GET["author"])) {
    require("./src/AuthorController.php");
} else if (isset($_GET["quote"])) {
    require("./src/QuoteController.php");
} else if (isset($_GET["category"])) {
    require("./src/CategoryController.php");
} else if (isset($_GET["user"])) {
    require("./src/UserController.php");
} else if (isset($_GET["admin"])) {
    require("./src/AdminController.php");
} else if (isset($_GET["error"])) {
    require("./src/ErrorController.php");
} else {
    require("./src/home.php"); 
}



/* -- ANCIEN ROUTEUR TRèS MOCHE

    if ($_GET["r"] == "connect") { // Appelle le contrôleur "Connect" afin d'afficher la page à l'utilisateur.
        require("./src/ConnectController.php");
    } else if ($_GET["r"] == "explore") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/ExploreController.php");
    } else if ($_GET["r"] == "post") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/PostController.php");
    } else if ($_GET["r"] == "library") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/LibraryController.php");
    } else if ($_GET["r"] == "settings") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/SettingsController.php");
    } else if ($_GET["r"] == "admin") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./src/AdminController.php");
    } else if ($_GET["r"] == "disconnect") { // Appelle le contrôleur "Disconnect" afin de deconnecter page à l'utilisateur.
        require("./src/DisconnectController.php");    
    }
*/