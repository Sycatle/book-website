<?php
namespace sycatle\beblio\entity;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entity/user.php");
use sycatle\beblio\entity\User;

class Post {
    private Manager $manager;

    private $postId;
    private $postType;
    private $postUser;
    private $postDate;
    private $postVisible;

    function __construct($postId){
        $this->postId = $postId;
        $this->manager = new Manager();

        $this->postType = $this->getData('post_type');
        $this->postUser = new User($this->getData('post_user_id'));
        $this->postDate = $this->getData('post_date');
        $this->postVisible = $this->getData('post_visible');
    }

    public function getData($key) {
        $statement= $this->manager->getDataManager()->connectDatabase()->prepare(
            "SELECT $key FROM posts WHERE post_id=:post_id"
        );
        $statement->execute(array(
            ':post_id'=>$this->postId
        ));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row[$key];
    }

    public function getPostId(){
        return $this->postId;
    }

    public function getPostType(){
        return $this->postType;
    }

    public function getPostUser(){
        return $this->postUser;
    }

    public function getPostDate(){
        return $this->postDate;
    }

    public function setPostDate($date){
        return $this->postDate = $date;
    }

    public function isVisible(){
        return $this->postVisible;
    }

    public function setVisible($visible){
        $this->postVisible = $visible;
    }
}