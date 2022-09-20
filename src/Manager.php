<?php
namespace sycatle\beblio;
require_once("./src/managers/DataManager.php");
require_once("./src/managers/PostManager.php");
require_once("./src/managers/BookManager.php");
require_once("./src/managers/UserManager.php");
require_once("./src/managers/AuthorManager.php");
require_once("./src/managers/GenderManager.php");
require_once("./src/managers/QuoteManager.php");
require_once("./src/managers/FormManager.php");
require_once("./src/managers/ImageManager.php");

class Manager{
    public function getDataManager() {
        return new managers\DataManager();
    }

    public function getUserManager() {
        return new managers\UserManager();
    }

    public function getPostManager() {
        return new managers\PostManager();
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

    public function getImageManager($filename){
        return new managers\ImageManager($filename);
    }
}