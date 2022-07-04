<?php
if (!isset($_SESSION)) session_start();

require("./src/Manager.php");

$manager = new \sycatle\beblio\Manager();
$authorManager = $manager->getAuthorManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if (isset($_GET['slug']) || isset($_GET['id'])) {
    $author = isset($_GET['id']) ? $authorManager->getAuthorById($_GET['id']) : $authorManager->getAuthorBySlug($_GET['slug']);
    if ($author == null) header("Location: ./?error=404");
    
    require("./src/templates/views/author.php");
} else {
    header("Location: .");
}

?>