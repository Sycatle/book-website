<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$categoryManager = $manager->getGenderManager();

if (isset($_GET['slug'])) {
    require("./src/templates/views/gender.php");
} else {
    header("Location: .");
}