<?php 
namespace sycatle\beblio\managers;
require_once("./src/Manager.php");

class GenderManager extends \sycatle\beblio\Manager {

    function registerGender($title, $slug, $category, $description, $summary, $parution, $category_id, $book_cover) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO category (title, slug, category, description, summary, parution, category_id) VALUES (:title, :slug, :category, :description, :summary, :parution, :category_id)"
            );
            $statement->execute(array(
                ':title' => $title,
                ':slug' => $slug,
                ':category' => $category,
                ':description'=> $description,
                ':summary'=>$summary,
                ':parution'=>$parution,
                ':category_id'=>$category_id
            ));
            move_uploaded_file($book_cover['tmp_name'], 'uploads/books/' . basename($slug.".webp"));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getGenderData(String $key) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM categories

            WHERE category_slug=:category_slug"
        );

        $statement->execute(array(":category_slug" => $key));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

}