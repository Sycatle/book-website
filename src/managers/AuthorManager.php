<?php 
namespace sycatle\beblio\managers;
require_once("Manager.php");
require_once("entities/postables/Author.php");
use sycatle\beblio\entities\Author;

class AuthorManager extends \sycatle\beblio\Manager {

    public function getAuthorById($id) {
        return new Author($id);
    }

    public function getAuthorBySlug(String $slug) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM authors

            WHERE author_slug='$slug'"
        );

        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);

        return $this->getAuthorById($row['author_id']);
    }

    public function getAuthors($limit = 15){
        $sqlRequest = "SELECT * FROM authors 
            
        JOIN genders ON authors.author_gender_id = genders.gender_id

        ORDER BY RAND () 
        LIMIT $limit";

        $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute();
        
        return $statement;
    }

    public function getAuthorsByGender($gender, $limit = 15){
        $sqlRequest = "SELECT * FROM authors

        JOIN genders ON authors.author_gender_id = genders.gender_id
        
        WHERE author_gender_id=$gender

        LIMIT $limit";

        $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute();
        
        return $statement;
    }

    public function getAuthorsSortedByViews($limit = 10){
        $sqlRequest ="SELECT * FROM authors

                    JOIN genders 
                    ON authors.author_gender_id = genders.gender_id

                    ORDER BY authors.author_views DESC
                    LIMIT $limit";
        $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute();
        
        return $statement;
    }

    function registerAuthor($author_name, $author_name_slug, $author_birth, $author_gender, $author_description, $author_biography, $author_picture) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO authors (author_name, author_slug, author_birth, author_gender_id, author_description, author_biography) VALUES (:author_name, :author_slug, :author_birth, :author_gender_id, :author_description, :author_biography)"
            );
            $statement->execute(array(
                ':author_name' => $author_name,
                ':author_slug' => $author_name_slug,
                ':author_birth' => $author_birth,
                ':author_gender_id'=> $author_gender,
                ':author_description'=>$author_description,
                ':author_biography'=>$author_biography
            ));
            move_uploaded_file($author_picture['tmp_name'], 'uploads/authors/' . basename($author_name_slug.".webp"));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    function deleteAuthor(Author $author) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "DELETE FROM authors WHERE author_slug = '$author->getSlug()'"
            );
            $statement->execute();

            // $file_destination = '.\\uploads\\articles\\' . $articleSlug . '.webp';

            // /* Suspression de l'image dans le repertoire */
            // @unlink($file_destination);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}