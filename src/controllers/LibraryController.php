<?php

session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entity\User($_SESSION['id']) : null;

if ($user != null) {
	require("./src/templates/pages/library.php");
} else {
	header("Location: .");
}