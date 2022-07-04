<?php

namespace sycatle\beblio\entities;

require_once('./src/Manager.php');

use sycatle\beblio\Manager;

require_once('./src/entities/Postable.php');

use sycatle\beblio\entities\Postable;

class User
{
    private int $id;
    private String $username;
    private String $firstname;
    private String $lastname;
    private String $email;
    private String $password;
    private String $gender;
    private $birthDate;
    private $joinDate;
    private $lastSeen;

    private $manager;
    private $userManager;

    function __construct(int $id)
    {
        $this->manager = new Manager();
        $this->userManager = $this->manager->getUserManager();

        $this->id = $id;
        $this->username = $this->getData("user_username");
        $this->firstname = $this->getData("user_firstname");
        $this->lastname = $this->getData("user_lastname");
        $this->email = $this->getData("user_email");
        $this->password = $this->getData("user_password");
        $this->gender = $this->getData('user_gender');
        $this->birthDate = $this->getData('user_birthdate');
        $this->joinDate = $this->getData('user_joindate');
        $this->lastSeen = $this->getData('user_lastseen');

        if (!$this->isValid()) {
            header("Location ./?r=logout");
            exit();
        }
    }

    public function setupSession()
    {
        if (!isset($_SESSION)) session_start();

        $_SESSION['user'] = $this;
        $_SESSION['id'] = $this->id;
        $_SESSION['firstname'] = $this->firstname;
        $_SESSION['lastname'] = $this->lastname;
        $_SESSION['username'] = $this->username;
        $_SESSION['email'] = $this->email;
    }

    public function deleteSession() {
        if (!isset($_SESSION)) session_start();

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
    }

    public function getData($key)
    {
        return $this->userManager->getData($key, $this->id);
    }

    public function post(Postable $post)
    {
        return $this->manager->getPostManager()->registerPost($post, $this);
    }

    /* USER ACTIONS */
    public function login()
    {
        return $this->userManager->loginUser($this->username, $this->password);
    }
    public function register()
    {
        return $this->userManager->registerUser($this->firstname, $this->lastname, $this->username, $this->email, $this->password);
    }
    public function disconnect()
    {
        $this->redirect('./?r=disconnect');
    }
    public function redirect($location, $timer = 0)
    {
        header("refresh:$timer, location: " . $location);
    }

    public function delete()
    {
        $this->deleteSession();
        $this->userManager->deleteUser($this->getUsername());
    }

    /* CONDITIONS */
    public function hasPermission($permission)
    {
        $userPermissions = $this->userManager->getPermissions($this->id);
        if ($userPermissions == null) return false;
        return $userPermissions[$permission] == 1;
    }
    public function isAdult()
    {
        /* TO DO */
    }

    public function isValid()
    {
        return $this->getData("user_id") != null;
    }

    /* GETTERS */
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getJoinDate()
    {
        return $this->joinDate;
    }
    public function getLastSeen()
    {
        return $this->lastSeen;
    }
    public function getBirthDate()
    {
        return $this->birthDate;
    }
    public function getAvatarUrl()
    {
        return './uploads/users/avatars/' . $this->username . '.webp';
    }
    public function getBannerUrl()
    {
        return './uploads/users/banners/' . $this->username . '.webp';
    }

    /* SETTERS */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
    }
    public function setLastSeen($lastSeen)
    {
        $this->lastSeen = $lastSeen;
    }
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }
    public function setAvatar($avatar)
    { /* TO DO */
    }
    public function setBanner($banner)
    { /* TO DO */
    }
}
