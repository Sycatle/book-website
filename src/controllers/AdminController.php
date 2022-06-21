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

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if ($user != null && $user->hasPermission('access_admin')) {
    $users = $manager->getUserManager()->getUsers();
    
	require("./src/templates/pages/admin.php");
} else {
	header("Location: .");
}

