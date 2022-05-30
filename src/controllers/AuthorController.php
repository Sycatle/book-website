<?php
/*
    ----------------------------------------------------------------------

    Object : Author Controller
             Access to an author page

    Author: Sycatle
    Creation Date: 1st April 2022
    Last Update: 22nd May 2022
    Changelogs:
        - 
    To-do:
        - 

    ----------------------------------------------------------------------
*/

session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$authorManager = $manager->getAuthorManager();

if (isset($_GET['author'])) {
    require("./src/templates/contents/author.php");
} else {
    header("Location: .");
}