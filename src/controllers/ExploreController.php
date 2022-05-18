<?php

session_start();

require('./models/Manager.php');
$manager = new \sycatle\beblio\models\Manager();

$books = $manager->getBookManager()->getBooks();

require("./views/pages/explore.php");

/* if(isset($_SESSION["user"])) {
	require_once("./views/dashboard.php");
	$books = $manager->getBookManager()->getBooks();
} else {
	require_once("./views/welcome.php");
} */
	