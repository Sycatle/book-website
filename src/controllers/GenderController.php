<?php
if (!isset($_SESSION)) session_start();

require("Manager.php");

$manager = new \sycatle\beblio\Manager();
$genderManager = $manager->getGenderManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if (isset($_GET['slug'])) {
    //$gender = $genderManager->getGenderBySlug($_GET['slug']);
    $genderData = $genderManager->getGenderData($_GET['slug']);
    if ($genderData == null) header("Location: ./?error=404");

    $genderId = $genderData['gender_id'];
    $genderName = $genderData['gender_name'];
    $genderDescription = $genderData['gender_description'];
    require("templates/views/gender.php");
} else {
    header("Location: .");
}
?>
