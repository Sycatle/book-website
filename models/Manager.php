<?php
namespace sycatle\beblio\models;
require_once("./models/managers/DataManager.php");
require_once("./models/managers/BookManager.php");
require_once("./models/managers/UserManager.php");
require_once("./models/managers/AuthorManager.php");
require_once("./models/managers/CategoryManager.php");
require_once("./models/managers/QuoteManager.php");

class Manager{
    public function getDataManager() {
        return new \sycatle\beblio\models\managers\DataManager();
    }

    public function getUserManager() {
        return new \sycatle\beblio\models\managers\UserManager();
    }

    public function getBookManager() {
        return new \sycatle\beblio\models\managers\BookManager();
    }

    public function getAuthorManager() {
        return new \sycatle\beblio\models\managers\AuthorManager();
    }

    public function getCategoryManager() {
        return new \sycatle\beblio\models\managers\CategoryManager();
    }

    public function getQuoteManager() {
        return new \sycatle\beblio\models\managers\QuoteManager();
    }

    public function encrypt(String $data) : String{
        return hash('sha256', $data);
    }

    public function decrypt(String $data) : String {
        return hash('sha256', $data);
    }

}