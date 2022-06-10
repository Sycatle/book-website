<?php

session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

if (isset($_SESSION['id'])) {
    $user = new \sycatle\beblio\entity\User($_SESSION['id']);
    require("./src/templates/pages/home.php");
} else {
    require("./src/templates/pages/main.php");
}