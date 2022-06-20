<?php
session_start();

require('./src/Manager.php');
use sycatle\beblio\Manager;
use sycatle\beblio\entity\User;

$manager = new Manager();

if (isset($_SESSION['id'])) {
    $user = new User($_SESSION['id']);

    $books = $manager->getBookManager()->getBooks();
    $genders = $manager->getGenderManager()->getGenders();

    require("./src/templates/pages/home.php");
} else {
    require("./src/templates/pages/main.php");
}