<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$authorManager = $manager->getAuthorManager();

if (isset($_GET['slug'])) {
    require("./src/templates/views/author.php");
} else {
    header("Location: .");
}