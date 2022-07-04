<?php 
namespace sycatle\beblio\managers;
require_once("./src/Manager.php");
use sycatle\beblio\Manager;

class QuoteManager extends Manager {

    public function getQuotes($limit = 15) {
        $statement= $this->getDataManager()->connectDatabase()->prepare(
            "SELECT * FROM quotes
            JOIN authors ON quotes.quote_author_id = authors.author_id
            JOIN genders ON quotes.quote_gender_id = genders.gender_id
            ORDER BY RAND ()
            LIMIT $limit"
        );
        $statement->execute();
        
        return $statement;
    }

    function registerQuote($quote_text, $quote_slug, $quote_author_id, $quote_gender_id) {
        $sqlRequest = "INSERT INTO quotes (quote_text, quote_slug, quote_author_id, quote_gender_id) VALUES (:quote_text, :quote_slug, :quote_author_id, :quote_gender_id)";
        try {
            $statement = $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
            $statement->execute(array(
                ':quote_text' => $quote_text,
                ':quote_slug' => $quote_slug,
                ':quote_author_id' => $quote_author_id,
                ':quote_gender_id'=> $quote_gender_id
            ));
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getQuoteData(String $key) {
        $sqlRequest = "SELECT * FROM quotes

        JOIN genders ON quotes.quote_gender_id = genders.gender_id
        JOIN authors ON quotes.quote_author_id = authors.author_id

        WHERE quote_slug=:quote_slug";

        $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute(array(":quote_slug" => $key));

        $row=$statement->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getQuotesByAuthor($author, $limit = 15){
        $sqlRequest = "SELECT * FROM quotes

        JOIN authors ON quotes.quote_author_id = authors.author_id
        JOIN genders ON quotes.quote_gender_id = genders.gender_id
        
        WHERE quote_author_id=:quote_author_id
        ORDER BY RAND ()
        LIMIT $limit";

        $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute(array(":quote_author_id" => $author));
        
        return $statement;
    }

    public function getQuotesByGender($gender, $limit = 15){
        $sqlRequest = "SELECT * FROM quotes

        JOIN authors ON quotes.quote_author_id = authors.author_id
        JOIN genders ON quotes.quote_gender_id = genders.gender_id

        WHERE quote_gender_id=:quote_gender_id
        ORDER BY RAND ()
        LIMIT $limit";

        $statement= $this->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute(array(":quote_gender_id" => $gender));
        
        return $statement;
    }
}