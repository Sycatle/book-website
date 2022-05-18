<?php
session_start();

require("./models/Manager.php");
$manager = new \sycatle\beblio\models\Manager();

if (isset($_GET['error'])) {
    require("./views/pages/error.php");
} else {
    header("Location: .");
}