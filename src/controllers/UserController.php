<?php
session_start();

require("./models/Manager.php");
$manager = new \sycatle\beblio\models\Manager();
$userManager = $manager->getUserManager();

if (isset($_GET['user'])) {
    require("./views/contents/user.php");
} else {
    header("Location: .");
}