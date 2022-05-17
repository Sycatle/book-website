<?php

session_start();

require('./models/Manager.php');
$manager = new \sycatle\beblio\models\Manager();

require("./views/pages/library.php");