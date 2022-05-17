<?php
session_start();

require("./models/Manager.php");
$manager = new \sycatle\beblio\models\Manager();
$bookManager = $manager->getBookManager();

if (isset($_GET['book'])) {
    require("./views/contents/book.php");
} else {
    header("Location: .");
}