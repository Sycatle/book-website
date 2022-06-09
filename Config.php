<?php

namespace sycatle\beblio;

class Config{

    private String $databaseHost = "freehanadmin.mysql.db"; 
    private String $databaseName = "freehanadmin";
    private String $databaseUser = "freehanadmin";
    private String $databasePassword = "XPnySrR53nGCmBwUs4Abua7BaHpHVL";

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