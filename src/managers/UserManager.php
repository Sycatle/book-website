<?php

namespace sycatle\beblio\managers;

use sycatle\beblio\entities\User;
use sycatle\beblio\Manager;

require_once("./src/Manager.php");
require_once("./src/entities/User.php");

class UserManager extends Manager
{
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

    public function loginUser($identifier, $password)
    {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "SELECT * FROM users WHERE user_username=:user_username OR user_email=:user_email"
            );
            $statement->execute(array(
                ':user_username' => $identifier,
                ':user_email' => $identifier
            ));
            $row = $statement->fetch(
                \PDO::FETCH_ASSOC
            );

            if ($statement->rowCount() > 0) {
                if ($identifier == $row["user_username"] || $identifier == $row["user_email"]) {
                    if ($this->getFormManager()->encrypt($password) == $row["user_password"]) {
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

    function registerUser($firstname = null, $lastname = null, $username, $email, $password, $avatar = null)
    {
        try {
            $sql = "INSERT INTO users (user_firstname, user_lastname, user_username, user_email, user_password) VALUES (:user_firstname, :user_lastname, :user_username, :user_email, :user_password)";
            $statement = $this->getDataManager()->connectDatabase()->prepare($sql);
            $statement->execute(array(
                ':user_firstname' => $firstname,
                ':user_lastname' => $lastname,
                ':user_username' => $username,
                ':user_email' => $email,
                ':user_password' => $this->getFormManager()->encrypt($password)
            ));

            if ($avatar != null) {
                $fileInfo = pathinfo($avatar['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                $allowedMaxSize =  0.5 * 1000000; // Taille maximum du fichier: 0.5Mega-octets/500Kilo-octets

                if ($avatar['error'] == 0) {
                    if (in_array($extension, $allowedExtensions)) {
                        if ($avatar['size'] <= $allowedMaxSize) {
                            $avatar_cropped = $this->getImageManager($avatar['tmp_name'])->resize_to(150, 150, false)->output();
                            $avatar_cropped->save("uploads/users/avatars/" . basename($username.".webp"));
                        }
                    }
                }
            }

            return true;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        return false;
    }

    public function deleteUser($username) {
        try {
            $sql = "DELETE FROM users WHERE user_username = '$username'";
            $statement = $this->getDataManager()->connectDatabase()->prepare($sql);
            $statement->execute();

            $file_destination = '.\\uploads\\users\\avatars\\' . $username . '.webp';
            /* Suspression de l'image dans le repertoire */
            if (file_exists($file_destination)) @unlink($file_destination);
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }

    function isUsernameAvailable($username)
    {
        $sql = "SELECT user_username FROM users WHERE user_username=:user_username";
        $statement = $this->getDataManager()->connectDatabase()->prepare($sql);
        $statement->execute(array(
            ':user_username' => $username
        ));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row["user_username"] != $username; // Si l'username match avec un username de la base de données, false.
    }

    function isMailAvailable($email)
    {
        $statement = $this->getDataManager()->connectDatabase()->prepare(
            "SELECT user_username FROM users WHERE user_email=:user_email"
        );

        $statement->execute(array(':user_email' => $email));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row["user_email"] != $email; // Si le mail match avec un mail de la base de données, false.
    }

    public function getUserRow($id)
    {
        $statement = $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM users WHERE user_id=:user_id");
        $statement->execute(array(':user_id' => $id));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getData($key, $id){
        $sqlRequest = "SELECT " . $key . " FROM users WHERE user_id=:user_id";

        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
            $statement->execute(array(
                ':user_id' => $id
            ));
            $row = $statement->fetch(\PDO::FETCH_ASSOC);

            return $row[$key];
        } catch (\PDOException $exception) {
            die("Erreur lors de la tentative de récupération des données: " . $exception->getMessage());
        }
    }

    public function getPermissions($id)
    {
        $statement = $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM permissions WHERE user_id=:user_id");
        $statement->execute(array(':user_id' => $id));
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }
}
