<?php

session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

if ($user != null) {
    require("./src/templates/pages/settings.php");
} else {
    header("Location: .");
}