<?php 
namespace sycatle\beblio\managers;

require_once("./src/Manager.php");

use JetBrains\PhpStorm\ArrayShape;
use sycatle\beblio\Manager;
require_once("./src/entities/postables/Book.php");
use sycatle\beblio\entities\Book;

class BookManager extends Manager {

    public function getBooks($limit = 10){
        $sqlRequest = 
        "SELECT * FROM books

        JOIN authors 
        ON books.book_author_id = authors.author_id
        JOIN genders 
        ON books.book_gender_id = genders.gender_id
        /*JOIN posts 
        ON books.book_post_id = posts.post_id
        WHERE posts.post_visible = true */

        LIMIT $limit";
        $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute();
        
        return $statement;
    }

    public function getBooksByGender($gender, $limit = 10) {
        $statement = [];
        try {
            $sqlRequest =   "SELECT * FROM books
                            JOIN authors ON books.book_author_id = authors.author_id
                            JOIN genders ON books.book_gender_id = genders.gender_id
                            WHERE book_gender_id=$gender
                            LIMIT $limit";
            $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
            $statement->execute();
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        } finally {
            return $statement;
        }
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