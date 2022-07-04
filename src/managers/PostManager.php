<?php 
namespace sycatle\beblio\managers;
use sycatle\beblio\entities\Postable;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entities/User.php");
use sycatle\beblio\entities\User;

class PostManager extends Manager {

    public $postTypes = [
        0 => 'book',
        1 => 'author',
        2 => 'quote',
        3 => 'gender'
    ];

    function registerPost($post, $user) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO posts (post_type, post_user_id) VALUES (:post_type, :post_user)"
            );
            $statement->execute(array(
                ':post_type'	=> $post->getPostType(),
                ':post_user_id'	=> $user->getId()
            ));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    function updatePost($user) {
        // TO DO
    }

    function removePost($postId) {
        // TO DO
    }

    public function getPost($id) {
        return new Postable($id);
    }

    public function getPosts() {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM posts"
        );
        $statement->execute();
        
        return $statement;
    }

    public function getPostsByUser(User $user, $limit = 10) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM posts

            JOIN users
            ON posts.post_user_id = users.user_id

            WHERE post_user_id=:post_user_id

            LIMIT $limit"
        );

        $statement->execute(array(
            ":post_user_id" => $user->getId()
        ));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getPostsByType($type, $limit = 10) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM posts

            WHERE post_type_id=:post_type_id
            
            LIMIT $limit"
        );

        $statement->execute(array(
            ":post_type_id" => $type
        ));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }
}