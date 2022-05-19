<?php 
namespace sycatle\beblio\managers;
require_once("./src/Manager.php");
require_once("./src/entity/User.php");

class UserManager extends \sycatle\beblio\Manager {
    private $user;

    public function getUsers(){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM users ORDER BY user_id");
        $statement->execute();

        return $statement;
    }

    public function createUser($id) {
        $user = new \sycatle\beblio\entity\User($id);
        
        return $user;
    }

    public function getUser($id) {
        return $this->createUser($id);
    }

    public function getByUsername($username){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT user_id FROM users WHERE user_username=:user_username");
        $statement->execute(array(':user_username'=>$username));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        $user = new \sycatle\beblio\objects\User($row['user_id']);
        return $user;
    }
    
    public function login($identifier, $password) {
        try{
			$statement = $this->getDataManager()->connectDatabase()->prepare(
                "SELECT * FROM users WHERE user_username=:user_username OR user_email=:user_email"
            );
			$statement->execute(array(
                ':user_username'=>$identifier, 
                ':user_email'=> $this->encrypt($identifier)
            ));
			$row = $statement->fetch(
                \PDO::FETCH_ASSOC
            );
			
			if($statement->rowCount() > 0) {
                if (($identifier==$row["user_username"] || $this->encrypt($identifier)==$row["user_email"])
                && $this->encrypt($password)==$row["user_password"]) {
                    return $row["user_id"];
                }
			}
		} catch(\PDOException $e) {
			$e->getMessage();
		}	
    }

    function register(String $firstname, String $lastname, String $username, String $email, String $password) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO users (user_firstname, user_lastname, user_username, user_email, user_password) VALUES (:user_firstname, :user_lastname, :user_username, :user_email, :user_password)"
            );
            $statement->execute(array(
                ':user_firstname' => $firstname,
                ':user_lastname' => $lastname,
                ':user_username' => $username,
                ':user_email'=>$this->encrypt($email),
                ':user_password'=>$this->encrypt($password)
            ));
            
            return $this->login($username, $password);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    function isUsernameTaken($username){
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT user_username FROM users WHERE user_username=:user_username"
        );

        $statement->execute(array(
            ':user_username'=>$username
        ));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row["user_username"]==$username;
    }
    
    function isMailTaken($email){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT user_username FROM users WHERE user_email=:user_email");

        $statement->execute(array(':user_email'=>$email));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row["user_email"]==$email;
    }

    public function getUserRow($id) {
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM users WHERE user_id=:user_id");
        $statement->execute(array(':user_id'=>$id));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getPermissions($id){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM permissions WHERE user_id=:user_id");
        $statement->execute(array(':user_id'=>$id));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }
}