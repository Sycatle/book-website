<?php
session_start();

require("./models/Manager.php");
$manager = new \sycatle\beblio\models\Manager();
$authorManager = $manager->getAuthorManager();

if (isset($_GET['author'])) {
    require("./views/contents/author.php");
} else {
    header("Location: .");
}