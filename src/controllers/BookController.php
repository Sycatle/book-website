<?php
session_start();

require("./src/Manager.php");

$manager = new \sycatle\beblio\Manager();
$bookManager = $manager->getBookManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if (isset($_GET['slug'])) {
    $book = $bookManager->getBookById($bookManager->getBookData($_GET['slug'])['book_id']);
    if ($book == null) header("Location: ./?error=404");

    require("./src/templates/views/book.php");
} else {
    header("Location: .");
}