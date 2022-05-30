<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$bookManager = $manager->getBookManager();

if (isset($_GET['slug'])) {
    require("./src/templates/pages/book.php");
} else {
    header("Location: .");
}