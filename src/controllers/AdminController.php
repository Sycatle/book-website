<?php

/*
    ----------------------------------------------------------------------

    Object : Admin Panel Controller
             Checking to access admin panel

    Author: Sycatle
    Creation Date: 1st April 2022
    Last Update: 20th May 2022
    Changelogs:
        - 
    To-do:
        - 

    ----------------------------------------------------------------------
*/

session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

require("./src/templates/pages/admin.php");