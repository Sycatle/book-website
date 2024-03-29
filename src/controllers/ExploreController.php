<?php

if (!isset($_SESSION)) session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if ($user != null) {
	$books = $manager->getBookManager()->getBooks();
	require("templates/pages/explore.php");
} else {
	header("Location: .");
}
	
?>