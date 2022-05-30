<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$categoryManager = $manager->getCategoryManager();

if (isset($_GET['slug'])) {
    require("./src/templates/pages/category.php");
} else {
    header("Location: .");
}