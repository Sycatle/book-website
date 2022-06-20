<?php
session_start();

require("./src/Manager.php");

$manager = new \sycatle\beblio\Manager();
$authorManager = $manager->getAuthorManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entity\User($_SESSION['id']) : null;

if (isset($_GET['slug'])) {
    $authorData = $authorManager->getAuthorData($_GET['slug']);
    if ($authorData == null) header("Location: ./?error=404");

    $authorId = $authorData['author_id'];
    $authorName = $authorData['author_name'];
    $authorSlug = $authorData['author_slug'];
    $authorBirth = $authorData['author_birth'];
    $authorDescription = $authorData['author_description'];
    $authorGender = $authorData['gender_name'];
    $authorGenderSlug = $authorData['gender_slug'];
    $authorGenderColor = $authorData['gender_color'];
    $authorBiography = $authorData['author_biography'];
    
    require("./src/templates/views/author.php");
} else {
    header("Location: .");
}
