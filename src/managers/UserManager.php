<?php

namespace sycatle\beblio\managers;

use sycatle\beblio\entity\User;
use sycatle\beblio\Manager;
use sycatle\beblio\managers\FormManager;

require_once("./src/Manager.php");
require_once("./src/entity/User.php");

class UserManager extends Manager{
    private $user;

    public function getUsers()
    {
        $statement = $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM users ORDER BY user_id");
        $statement->execute();

        return $statement;
    }

    public function createUser($id)
    {
        $user = new User($id);

        return $user;
    }

    public function getUser($id)
    {
        return $this->createUser($id);
    }

    public function getByUsername($username)
    {
        $statement = $this->getDataManager()->connectDatabase()->prepare("SELECT user_id FROM users WHERE user_username=:user_username");
        $statement->execute(array(':user_username' => $username));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        $user = new User($row['user_id']);
        return $user;
    }

    public function loginUser($identifier, $password) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "SELECT * FROM users WHERE user_username=:user_username OR user_email=:user_email"
            );
            $statement->execute(array(
                ':user_username' => $identifier,
                ':user_email' => $this->encrypt($identifier)
            ));
            $row = $statement->fetch(
                \PDO::FETCH_ASSOC
            );

            if ($statement->rowCount() > 0) {
                if ($identifier == $row["user_username"] || $this->encrypt($identifier) == $row["user_email"]) {
                    if ($this->encrypt($password) == $row["user_password"]) {
                        $user = new User($row["user_id"]);
                        $user->setupSession();
                        return true;
                    }
                }
            }
            return false;
        } catch (\PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    function registerUser(String $firstname, String $lastname, String $username, String $email, String $password){
        try {
            $sql = "INSERT INTO users (user_firstname, user_lastname, user_username, user_email, user_password) VALUES (:user_firstname, :user_lastname, :user_username, :user_email, :user_password)";
            $statement = $this->getDataManager()->connectDatabase()->prepare($sql);
            $statement->execute(array(
                ':user_firstname' => $firstname,
                ':user_lastname' => $lastname,
                ':user_username' => $username,
                ':user_email' => $this->encrypt($email),
                ':user_password' => $this->encrypt($password)
            ));
            return true;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        return false;
    }

    function isUsernameAvailable($username){
        $sql = "SELECT user_username FROM users WHERE user_username=:user_username";
        $statement = $this->getDataManager()->connectDatabase()->prepare($sql);
        $statement->execute(array(
            ':user_username' => $username
        ));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row["user_username"] != $username; // Si l'username match avec un username de la base de données, false.
    }

    function isMailAvailable($email) {
        $statement = $this->getDataManager()->connectDatabase()->prepare(
            "SELECT user_username FROM users WHERE user_email=:user_email"
        );

        $statement->execute(array(':user_email' => $email));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row["user_email"] != $email; // Si le mail match avec un mail de la base de données, false.
    }

    public function getUserRow($id) {
        $statement = $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM users WHERE user_id=:user_id");
        $statement->execute(array(':user_id' => $id));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getData($key, $id) {
        $statement = $this->manager->getDataManager()->connectDatabase()->prepare(
            "SELECT " . $key . " FROM users WHERE user_id=:user_id"
        );
        $statement->execute(array(
            ':user_id' => $id
        ));
        $value = $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getPermissions($id) {
        $statement = $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM permissions WHERE user_id=:user_id");
        $statement->execute(array(':user_id' => $id));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }
}
