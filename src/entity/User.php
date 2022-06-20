<?php
namespace sycatle\beblio\entity;
use sycatle\beblio\Manager;

class User{
    private int $id;
    private String $username;
    private String $firstname;
    private String $lastname;
    private String $email;
    private String $gender;
    private String $password;
    private $birthDate;
    private $joinDate;
    private $lastSeen;

    private $manager;
    private $userManager;

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new Manager();
        $this->userManager = $this->manager->getUserManager();

        $this->username = $this->getData("user_username");
        $this->firstname = $this->getData("user_firstname");
        $this->lastname = $this->getData("user_lastname");
        $this->email = $this->getData("user_email");
        $this->password = $this->getData("user_password");
    }

    public function getData($key) {
        $statement= $this->manager->getDataManager()->connectDatabase()->prepare(
            "SELECT " . $key . " FROM users WHERE user_id=:user_id"
        );
        $statement->execute(array(
            ':user_id'=>$this->id
        ));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row[$key];
    }

    public function setupSession(){
        session_start();

        $_SESSION['user'] = $this;
        $_SESSION['id'] = $this->id;
        $_SESSION['firstname'] = $this->firstname;
        $_SESSION['lastname'] = $this->lastname;
        $_SESSION['username'] = $this->username;
        $_SESSION['email'] = $this->email;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getJoinDate() {
        return $this->joinDate;
    }

    public function getLastSeen() {
        return $this->lastSeen;
    }

    public function setLastSeen($date) {
        $this->lastSeen = $date;
    }

    public function getBirthDate(){
        return $this->joinDate;
    }

    public function getAvatarUrl(){
        return './uploads/users/avatars/'. $this->username . '.webp';
    }

    public function getBannerUrl(){
        return './uploads/users/banners/'. $this->username . '.webp';
    }

    public function hasPermission($permission){
        $userPermissions = $this->manager->getUserManager()->getPermissions($this->id);
        if ($userPermissions == null) return false;
        return $userPermissions[$permission] == 1;
    }

}