<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$bookManager = $manager->getBookManager();

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
    $bookDescription = $bookData['book_description'];
    $bookSummary = $bookData['book_summary'];
    require("./src/templates/views/book.php");
} else {
    header("Location: .");
}