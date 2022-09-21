<?php
if (!isset($_SESSION)) session_start();

require('Manager.php');
use sycatle\beblio\Manager;
use sycatle\beblio\entities\User;

$manager = new Manager();
$user = isset($_SESSION['id']) ? new User($_SESSION['id']) : null;


require("templates/pages/home.php");
?>