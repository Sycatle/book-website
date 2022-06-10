<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$categoryManager = $manager->getGenderManager();

if (isset($_GET['slug'])) {
    $categoryData = $categoryManager->getGenderData($_GET['slug']);
    if ($categoryData == null) header("Location: ./?error=404");

    $categoryId = $categoryData['category_id'];
    $categoryName = $categoryData['category_name'];
    $categoryDescription = $categoryData['category_description'];
    require("./src/templates/views/gender.php");
} else {
    header("Location: .");
}
