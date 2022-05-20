<?php

namespace sycatle\beblio;

class Config{

    private String $databaseHost = "localhost"; 
    private String $databaseName = "tp_login";
    private String $databaseUser = "root";
    private String $databasePassword = "root";

    public function getDatabaseHost(){
        return $this->databaseHost;
    }

    public function getDatabaseName(){
        return $this->databaseName;
    }

    public function getDatabaseUser(){
        return $this->databaseUser;
    }

    public function getDatabasePassword(){
        return $this->databasePassword;
    }


}