<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$authorManager = $manager->getAuthorManager();

if (isset($_GET['slug'])) {
    $authorData = $authorManager->getAuthorData($_GET['slug']);
    if ($authorData == null) header("Location: ./?error=404");

    $authorId = $authorData['author_id'];
    $authorName = $authorData['author_name'];
    $authorSlug = $authorData['author_slug'];
    $authorBirth = $authorData['author_birth'];
    $authorDescription = $authorData['author_description'];
    $authorGender = $authorData['category_name'];
    $authorGenderSlug = $authorData['category_slug'];
    $authorBiography = $authorData['author_biography'];
    require("./src/templates/views/author.php");
} else {
    header("Location: .");
}
