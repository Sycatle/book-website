<?php
namespace sycatle\beblio;
require_once("managers/DataManager.php");
require_once("managers/BookManager.php");
require_once("managers/UserManager.php");
require_once("managers/AuthorManager.php");
require_once("managers/GenderManager.php");
require_once("managers/QuoteManager.php");
require_once("managers/FormManager.php");

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

    public function getGenderManager() {
        return new managers\GenderManager();
    }

    public function getQuoteManager() {
        return new managers\QuoteManager();
    }

    public function getFormManager() {
        return new managers\FormManager();
    }

    public function encrypt(String $data) : String{
        return hash('sha256', $data);
    }

    public function decrypt(String $data) : String {
        return hash('sha256', $data);
    }

}