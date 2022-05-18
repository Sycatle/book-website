<?php 
namespace sycatle\beblio\managers;
require_once("./src/Manager.php");

class DataManager extends \sycatle\beblio\Manager {
    private String $databaseHost = "localhost";
    private String $databaseName = "tp_login";
    private String $databaseUser = "root";
    private String $databasePassword = "root";

    public function connectDatabase(){
        try {
            $database = new \PDO("mysql:host=" . $this->databaseHost . ";dbname=" . $this->databaseName . ";charset=utf8", $this->databaseUser, $this->databasePassword);
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