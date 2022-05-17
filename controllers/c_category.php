<?php
session_start();

require("./models/Manager.php");
$manager = new \sycatle\beblio\models\Manager();
$categoryManager = $manager->getCategoryManager();

if (isset($_GET['category'])) {
    require("./views/contents/category.php");
} else {
    header("Location: .");
}