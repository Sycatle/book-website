<?php
session_start();

require("./src/Manager.php");

$manager = new \sycatle\beblio\Manager();
$authorManager = $manager->getAuthorManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if (isset($_GET['slug'])) {
    $author = $authorManager->getAuthorBySlug($_GET['slug']);
    if ($author == null) header("Location: ./?error=404");
    
    require("./src/templates/views/author.php");
} else {
    header("Location: .");
}
