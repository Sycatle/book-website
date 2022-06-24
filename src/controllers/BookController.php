<?php
session_start();

require("./src/Manager.php");

$manager = new \sycatle\beblio\Manager();
$bookManager = $manager->getBookManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if (isset($_GET['slug']) || isset($_GET['id'])) {
    $book = isset($_GET['id']) ? $bookManager->getBookById($_GET['id']) : $bookManager->getBookBySlug($_GET['slug']);

    require("./src/templates/views/book.php");
} else {
    header("Location: .");
}