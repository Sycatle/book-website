<?php 
namespace sycatle\beblio\managers;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entity/Book.php");
use sycatle\beblio\entity\Book;

class BookManager extends Manager {

    public function getBooks($limit = 10){
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM books

            JOIN authors 
            ON books.book_author_id = authors.author_id

            JOIN genders 
            ON books.book_gender_id = genders.gender_id

            LIMIT $limit"
        );
        $statement->execute();
        
        return $statement;
    }

    public function getBooksByGender($gender, $limit = 10){
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM books

            JOIN authors 
            ON books.book_author_id = authors.author_id

            JOIN genders
            ON books.book_gender_id = genders.gender_id

            WHERE book_gender_id=:book_gender_id
            
            LIMIT $limit"
        );
        $statement->execute(array(
            ":book_gender_id" => $gender
        ));
        
        return $statement;
    }

    public function getBooksByAuthor($author_id, $limit = 10){
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM books

            JOIN authors 
            ON books.book_author_id = authors.author_id

            JOIN genders
            ON books.book_gender_id = genders.gender_id

            WHERE book_author_id=:book_author_id
            
            LIMIT $limit"
        );
        $statement->execute(array(
            ":book_author_id" => $author_id
        ));
        
        return $statement;
    }

    public function getCategories(){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM genders ORDER BY gender_name");
        $statement->execute();
        
        return $statement;
    }

    public function getBookById($id) {
        return new Book($id);
    }

    function registerBook($title, $slug, $author_id, $description, $summary, $parution, $gender_id, $book_cover) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO books (book_title, book_slug, book_author, book_description, book_summary, book_parution, book_gender_id) VALUES (:book_title, :book_slug, :book_author, :book_description, :book_summary, :book_parution, :book_gender_id)"
            );
            $statement->execute(array(
                ':book_title' => $title,
                ':book_slug' => $slug,
                ':book_author_id' => $author_id,
                ':book_description'=> $description,
                ':book_summary'=>$summary,
                ':book_parution'=>$parution,
                ':book_gender_id'=>$gender_id
            ));
            move_uploaded_file($book_cover['tmp_name'], 'uploads/books/' . basename($slug.".webp"));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getBookData(String $key) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM books

            JOIN genders 
            ON books.book_gender_id = genders.gender_id

            JOIN authors
            ON books.book_author_id = authors.author_id

            WHERE book_slug=:book_slug"
        );
        $statement->execute(array(":book_slug" => $key));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

}