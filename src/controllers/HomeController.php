<?php

/*
    ----------------------------------------------------------------------

    Object : Home Page Controller
             Checking to access admin panel

    Author: Sycatle
    Creation Date: 1st April 2022
    Last Update: 22nd May 2022
    Changelogs:
        - 
    To-do:
        - 

    ----------------------------------------------------------------------
*/
use sycatle\beblio\entity\User;

if (isset($_SESSION['id'])) {
    $user = new User($_SESSION['id']);
    require("./src/templates/pages/home.php");
} else {
    require("./src/templates/main.php");
}

/* Futur controller */
// namespace sycatle\beblio\controllers;
// require('./src/Controller.php');
// use sycatle\beblio\Controller;

// class HomeController extends Controller{

//     public function __construct(){
//         $this->initTemplate("./src/templates/" . (isset($_SESSION["user"]) ? "pages/home.php" : "main.php"));
//         $this->showTemplatePage();
//     }
// }