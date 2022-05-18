<?php 
namespace sycatle\beblio\models\managers;
require_once("./models/Manager.php");

class AuthorManager extends \sycatle\beblio\models\Manager {

    public function getAuthors(){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM authors ORDER BY author_name");
        $statement->execute();
        
        return $statement;
    }

    public function getAuthorsByCategory($category){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM authors WHERE author_category_id=:author_category_id");
        $statement->execute(array(":author_category_id" => $category));
        
        return $statement;
    }

    public function getCategories(){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM categories ORDER BY category_name");
        $statement->execute();
        
        return $statement;
    }

    public function getAuthor($id) {
        return new \sycatle\beblio\models\objects\Author($id);
    }

    function registerAuthor($author_name, $author_name_slug, $author_birth, $author_gender, $author_description, $author_biography, $author_picture) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO authors (author_name, author_slug, author_birth, author_category_id, author_description, author_biography) VALUES (:author_name, :author_slug, :author_birth, :author_category_id, :author_description, :author_biography)"
            );
            $statement->execute(array(
                ':author_name' => $author_name,
                ':author_slug' => $author_name_slug,
                ':author_birth' => $author_birth,
                ':author_category_id'=> $author_gender,
                ':author_description'=>$author_description,
                ':author_biography'=>$author_biography
            ));
            move_uploaded_file($author_picture['tmp_name'], 'uploads/authors/' . basename($author_name_slug.".webp"));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAuthorData(String $key) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM authors

            JOIN categories 
            ON authors.author_category_id = categories.category_id

            WHERE author_slug=:author_slug"
        );
/*         JOIN authors_id 
        ON books.author_id = authors.author_id */

        $statement->execute(array(":author_slug" => $key));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

}