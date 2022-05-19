<?php

session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

require("./src/templates/pages/library.php");