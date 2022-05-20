<?php
namespace sycatle\beblio;
require_once("./src/managers/DataManager.php");
require_once("./src/managers/BookManager.php");
require_once("./src/managers/UserManager.php");
require_once("./src/managers/AuthorManager.php");
require_once("./src/managers/CategoryManager.php");
require_once("./src/managers/QuoteManager.php");

class Manager{
    public function getDataManager() {
        return new managers\DataManager();
    }

    public function getUserManager() {
        return new managers\UserManager();
    }

    public function getBookManager() {
        return new managers\BookManager();
    }

    public function getAuthorManager() {
        return new managers\AuthorManager();
    }

    public function getCategoryManager() {
        return new managers\CategoryManager();
    }

    public function getQuoteManager() {
        return new managers\QuoteManager();
    }

    public function encrypt(String $data) : String{
        return hash('sha256', $data);
    }

    public function decrypt(String $data) : String {
        return hash('sha256', $data);
    }

}