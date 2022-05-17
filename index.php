<?php

// $allowedRoutes = ["book", "author", "quote", "category", "user", "admin", "error"];

// Le fichier index.php est utilisé ici comme routeur, il appelle des contrôleurs spécifiques aux demandes de l'utilisateur.
if (isset($_GET["r"])) {
    if ($_GET["r"] == "connect") { // Appelle le contrôleur "Connect" afin d'afficher la page à l'utilisateur.
        require("./controllers/c_connect.php");
    } else if ($_GET["r"] == "explore") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./controllers/c_explore.php");
    } else if ($_GET["r"] == "post") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./controllers/c_post.php");
    } else if ($_GET["r"] == "library") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./controllers/c_library.php");
    } else if ($_GET["r"] == "settings") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./controllers/c_settings.php");
    } else if ($_GET["r"] == "admin") { // Appelle le contrôleur "Post" afin d'afficher la page à l'utilisateur.
        require("./controllers/c_admin.php");
    } else if ($_GET["r"] == "disconnect") { // Appelle le contrôleur "Disconnect" afin de deconnecter page à l'utilisateur.
        require("./controllers/c_disconnect.php");    
    } else {
        header("Location: ./?error=404"); // Renvoie vers la page principale si la requête est invalide.
    }
} else if (isset($_GET["book"])) {
    require("./controllers/c_book.php");
} else if (isset($_GET["author"])) {
    require("./controllers/c_author.php");
} else if (isset($_GET["quote"])) {
    require("./controllers/c_quote.php");
} else if (isset($_GET["category"])) {
    require("./controllers/c_category.php");
} else if (isset($_GET["user"])) {
    require("./controllers/c_user.php");
} else if (isset($_GET["admin"])) {
    require("./controllers/c_admin.php");
} else if (isset($_GET["error"])) {
    require("./controllers/c_error.php");
} else {
    require("./controllers/c_home.php"); // Envoie vers la page principale si aucune requête n'est spécifiée.
}