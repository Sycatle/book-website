<?php
session_start();

require("./src/Manager.php");

$manager = new \sycatle\beblio\Manager();
$bookManager = $manager->getBookManager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entity\User($_SESSION['id']) : null;

if (isset($_GET['slug'])) {
    $bookData = $bookManager->getBookData($_GET['slug']);
    if ($bookData == null) header("Location: ./?error=404");

    $bookTitle = $bookData['book_title'];
    $bookSlug = $bookData['book_slug'];
    $bookAuthor = $bookData['author_name'];
    $bookAuthorId = $bookData['author_id'];
    $bookAuthorSlug = $bookData['author_slug'];
    $bookParution = $bookData['book_parution'];
    $bookGender = $bookData['category_name'];
    $bookGenderSlug = $bookData['category_slug'];
    $bookGenderColor = $bookData['category_color'];
    $bookDescription = $bookData['book_description'];
    $bookSummary = $bookData['book_summary'];
    require("./src/templates/views/book.php");
} else {
    header("Location: .");
}