<?php
if (!isset($_SESSION)) session_start();

require('./src/Manager.php');
use sycatle\beblio\Manager;
use sycatle\beblio\entities\User;

$manager = new Manager();
$user = isset($_SESSION['id']) ? new User($_SESSION['id']) : null;


require("./src/templates/pages/home.php");
?>