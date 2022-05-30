<?php

/*
    ----------------------------------------------------------------------

    Object : Admin Panel Controller
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

namespace sycatle\beblio\controllers;
require('./src/Controller.php');
use sycatle\beblio\Controller;

class AdminController extends Controller{
    private $users = [];

    public function __construct(){
        session_start();
        
        $this->initVariables();
        $this->initTemplate("./src/templates/pages/admin.php");
        $this->showTemplatePage();
    }

    public function initVariables(){
        $this->users = $this->getManager()->getUserManager()->getUsers();
    }

    public function getUserList(){
        return $this->users;
    }

}