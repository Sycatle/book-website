<?php
namespace sycatle\beblio\entities;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entities/User.php");
use sycatle\beblio\entities\User;

class Postable {
    private $manager;
    private $dataManager;

    private $postId;
    private $postType;
    private $postUser;
    private $postDate;
    private $postVisible;

    function __construct($postId){
        $this->manager = new Manager();
        $this->dataManager = $this->manager->getDataManager();
        $this->postType = "post";

        $this->postId = $postId;
        $this->postUser = new User($this->getData($this->postType, 'post_user_id', $this->postId));
        $this->postDate = $this->getData($this->postType, 'post_date', $this->postId);
        $this->postVisible = $this->getData($this->postType, 'post_visible', $this->postId);
    }

    public function getData($type, $key, $where) {
        $this->manager = new Manager();
        $this->dataManager = $this->manager->getDataManager();
        return $this->dataManager->getData($type, $key, $where);
    }

    public function setData($type, $key, $value, $where) {
        $this->manager = new Manager();
        $this->dataManager = $this->manager->getDataManager();
        return $this->dataManager->setData($type, $key, $value, $where);
    }

    /* GETTERS */
    public function getPostableId(){ return $this->postId; }
    public function getPostableType() { return $this->postType; }
    public function getPostableUser(){ return $this->postUser; }
    public function getPostableDate(){ return $this->postDate; }
    public function setPostableDate($date){ return $this->postDate = $date; }
    public function isVisible(){ return $this->postVisible; }

    /* SETTERS */
    public function setVisible($visible){ $this->postVisible = $visible; }
}