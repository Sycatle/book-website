<?php
session_start();

require("./src/Manager.php");

$manager = new \sycatle\beblio\Manager();
$genderManager = $manager->getGenderManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entity\User($_SESSION['id']) : null;

if (isset($_GET['slug'])) {
    $genderData = $genderManager->getGenderData($_GET['slug']);
    if ($genderData == null) header("Location: ./?error=404");

    $genderId = $genderData['category_id'];
    $genderName = $genderData['category_name'];
    $genderDescription = $genderData['category_description'];
    require("./src/templates/views/gender.php");
} else {
    header("Location: .");
}
