<?php

session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

$books = $manager->getBookManager()->getBooks();

require("./src/templates/pages/explore.php");

/* if(isset($_SESSION["user"])) {
	require_once("./views/dashboard.php");
	$books = $manager->getBookManager()->getBooks();
} else {
	require_once("./views/welcome.php");
} */
	