<?php
session_start();

require("./models/Manager.php");
$manager = new \sycatle\beblio\models\Manager();
$quoteManager = $manager->getQuoteManager();

if (isset($_GET['quote'])) {
    require("./views/contents/quote.php");
} else {
    header("Location: .");
}