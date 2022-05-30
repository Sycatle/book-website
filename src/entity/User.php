<?php
namespace sycatle\beblio\entity;

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

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new \sycatle\beblio\Manager();

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
        $value=$statement->fetch(\PDO::FETCH_ASSOC);

        return $value[$key];
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

    public function getFirstName() {
        return $this->firstname;
    }

    public function getLastName(){
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

    public function hasPermission($permission){
        $userPermissions = $this->manager->getUserManager()->getPermissions($this->id);
        if ($userPermissions == null) return false;
        return $userPermissions[$permission] == 1;
    }

}