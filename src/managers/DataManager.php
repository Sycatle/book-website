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

    public function getData($type, $key, $where) {
        $sqlRequest = $this->getFormManager()->safeFormat("SELECT ".$key." FROM ".$type."s WHERE ".$type."_id=".$where);

        try {
            $statement= $this->connectDatabase()->prepare($sqlRequest);
            $statement->execute();
            $row=$statement->fetch(\PDO::FETCH_ASSOC);

            return $row[$key];
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function setData($type, $key, $value, $where) {
        $sqlRequest = $this->getFormManager()->safeFormat("UPDATE ".$type."s SET $key = $value WHERE ".$type."s.".$type."_id = $where");

        try {
            $statement= $this->connectDatabase()->prepare($sqlRequest);
            $statement->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

}