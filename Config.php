<?php

namespace sycatle\beblio;

class Config{
    private String $directory = "./";

    private String $databaseHost = "localhost"; 
    private String $databaseName = "web55e6207d5e8e_bebl";
    private String $databaseUser = "web55e6207d5e8e_root";
    private String $databasePassword = "(myJv!stA;dvVinQ";

    public function getDirectory(){
        return $this->directory;
    }

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