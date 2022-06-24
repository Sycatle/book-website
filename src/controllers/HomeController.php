<?php
session_start();

require('./src/Manager.php');
use sycatle\beblio\Manager;
use sycatle\beblio\entities\User;

$manager = new Manager();
$user = isset($_SESSION['id']) ? new User($_SESSION['id']) : null;

if ($user != null) {
    require("./src/templates/pages/home.php");
} else {
    require("./src/templates/pages/main.php");
}