<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$quoteManager = $manager->getQuoteManager();

if (isset($_GET['slug'])) {
    require("./src/templates/views/quote.php");
} else {
    header("Location: .");
}