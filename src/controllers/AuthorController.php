<?php
if (!isset($_SESSION)) session_start();

require("Manager.php");

$manager = new \sycatle\beblio\Manager();
$authorManager = $manager->getAuthorManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if (isset($_GET['slug']) || isset($_GET['id'])) {
    $author = isset($_GET['id']) ? $authorManager->getAuthorById($_GET['id']) : $authorManager->getAuthorBySlug($_GET['slug']);
    if ($author == null) header("Location: ./?error=404");
    
    $pageTitle = $author->getName();
    $canGoBack = true;
    $pageTypeName = "Auteurs";
    $pageDescription = $author->getDescription();

    $author->incrementView();

    require("templates/views/author.php");
} else {
    header("Location: .");
}

?>