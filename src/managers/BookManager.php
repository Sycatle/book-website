<?php 
namespace sycatle\beblio\models\managers;
require_once("./models/Manager.php");

class BookManager extends \sycatle\beblio\models\Manager {

    public function getBooks(){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM books ORDER BY book_title");
        $statement->execute();
        
        return $statement;
    }

    public function getBooksByCategory($category){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM books WHERE book_category_id=:book_category_id");
        $statement->execute(array(":book_category_id" => $category));
        
        return $statement;
    }

    public function getBooksByAuthor($author_id){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM books WHERE book_author_id=:book_author_id");
        $statement->execute(array(":book_author_id" => $author_id));
        
        return $statement;
    }

    public function getCategories(){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM categories ORDER BY category_name");
        $statement->execute();
        
        return $statement;
    }

    public function getBook($id) {
        return new \sycatle\beblio\models\objects\Book($id);
    }

    function registerBook($title, $slug, $author_id, $description, $summary, $parution, $category_id, $book_cover) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO books (book_title, book_slug, book_author, book_description, book_summary, book_parution, book_category_id) VALUES (:book_title, :book_slug, :book_author, :book_description, :book_summary, :book_parution, :book_category_id)"
            );
            $statement->execute(array(
                ':book_title' => $title,
                ':book_slug' => $slug,
                ':book_author_id' => $author_id,
                ':book_description'=> $description,
                ':book_summary'=>$summary,
                ':book_parution'=>$parution,
                ':book_category_id'=>$category_id
            ));
            move_uploaded_file($book_cover['tmp_name'], 'uploads/books/' . basename($slug.".webp"));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getBookData(String $key) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM books

            JOIN categories 
            ON books.book_category_id = categories.category_id

            JOIN authors
            ON books.book_author_id = authors.author_id

            WHERE book_slug=:book_slug"
        );
/*         JOIN authors_id 
        ON books.author_id = authors.author_id */

        $statement->execute(array(":book_slug" => $key));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

}