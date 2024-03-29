<?php 
namespace sycatle\beblio\managers;

require_once("Manager.php");
use sycatle\beblio\Manager;
require_once("entities/postables/Gender.php");
use sycatle\beblio\entities\Gender;

class GenderManager extends Manager {

    function getGender($gender_id){
        return new Gender($gender_id);
    }

    function getGenders($limit = 10){
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM genders
            ORDER BY RAND ()
            LIMIT $limit"
        );
        $statement->execute();
        
        return $statement;
    }

    function registerGender($title, $slug, $gender, $description, $summary, $parution, $gender_id, $book_cover) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO gender (title, slug, gender, description, summary, parution, gender_id) VALUES (:title, :slug, :gender, :description, :summary, :parution, :gender_id)"
            );
            $statement->execute(array(
                ':title' => $title,
                ':slug' => $slug,
                ':gender' => $gender,
                ':description'=> $description,
                ':summary'=>$summary,
                ':parution'=>$parution,
                ':gender_id'=>$gender_id
            ));
            move_uploaded_file($book_cover['tmp_name'], 'uploads/books/' . basename($slug.".webp"));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getGenderData(String $key) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM genders

            WHERE gender_slug=:gender_slug"
        );

        $statement->execute(array(":gender_slug" => $key));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

}