<?php
namespace sycatle\beblio\models\objects;

class User{
    private int $id;
    private String $username;
    private String $firstname;
    private String $lastname;
    private String $email;
    private String $gender;
    private String $password;
    private date $birthDate;
    private date $joinDate;
    private date $lastSeen;

    private $manager;

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new \sycatle\beblio\models\Manager();

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

    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getFirstName(): string {
        return $this->firstname;
    }

    public function getLastName(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function getJoinDate(): date {
        return $this->joinDate;
    }

    public function getLastSeen(): date {
        return $this->lastSeen;
    }

    public function setLastSeen(date $date): date {
        $this->lastSeen = $date;
    }

    public function getBirthDate(): date {
        return $this->joinDate;
    }

    public function hasPermission($permission){
        $userPermissions = $this->manager->getUserManager()->getPermissions($this->id);
        return $userPermissions[$permission] == 1;
    }

}