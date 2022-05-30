<?php 
namespace sycatle\beblio\managers;
require_once("./src/Manager.php");

class QuoteManager extends \sycatle\beblio\Manager {

    public function getQuotes() {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM quotes
            JOIN authors ON quotes.quote_author_id = authors.author_id
        ");
        $statement->execute();
        
        return $statement;
    }

    function registerQuote($quote_text, $quote_slug, $quote_author_id, $quote_category_id) {
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare(
                "INSERT INTO quotes (quote_text, quote_slug, quote_author_id, quote_category_id) VALUES (:quote_text, :quote_slug, :quote_author_id, :quote_category_id)"
            );
            $statement->execute(array(
                ':quote_text' => $quote_text,
                ':quote_slug' => $quote_slug,
                ':quote_author_id' => $quote_author_id,
                ':quote_category_id'=> $quote_category_id
            ));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getQuoteData(String $key) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM quotes

            JOIN categories 
            ON quotes.quote_category_id = categories.category_id

            JOIN authors
            ON quotes.quote_author_id = authors.author_id

            WHERE quote_slug=:quote_slug"
        );

        $statement->execute(array(":quote_slug" => $key));
        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getQuotesByGender($category){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM quotes WHERE quote_category_id=:quote_category_id");
        $statement->execute(array(":quote_category_id" => $category));
        
        return $statement;
    }
}