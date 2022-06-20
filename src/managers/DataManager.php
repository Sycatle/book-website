<?php 
namespace sycatle\beblio\managers;

require_once("./src/Config.php");
use sycatle\beblio\Config;
require_once("./src/Manager.php");
use sycatle\beblio\Manager;

class DataManager extends Manager {
    public function connectDatabase(){
        $config = new Config();
        try {
            $database = new \PDO("mysql:host=" . $config->getDatabaseHost() . ";dbname=" . $config->getDatabaseName() . ";charset=utf8", $config->getDatabaseUser(), $config->getDatabasePassword());
            $database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $database;
        } catch(\PDOException $e) {
            die("Erreur lors de la connexion à la base de données: " . $e->getMessage());
        }
        return null;
    }

    public function closeDatabase(){
        $database = null;
    }

}