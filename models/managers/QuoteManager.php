<?php 
namespace sycatle\beblio\models\managers;
require_once("./models/Manager.php");

class QuoteManager extends \sycatle\beblio\models\Manager {

    public function getQuote($id) {
        return new \sycatle\beblio\models\objects\Quote($id);
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

    public function getQuotesByCategory($category){
        $statement= $this->getDataManager()->connectDatabase()->prepare("SELECT * FROM quotes WHERE quote_category_id=:quote_category_id");
        $statement->execute(array(":quote_category_id" => $category));
        
        return $statement;
    }
}