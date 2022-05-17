<?php
namespace sycatle\beblio\models\objects;

class Book extends Post {
    private $id;
    private $title;
    private $author;
    private $slug;
    private $description;
    private $summary;
    private $category;

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new \sycatle\beblio\models\Manager();

        $this->title = $this->getData("title");
        $this->author = $this->getData("author");
        $this->slug = $this->getData("slug");
        $this->description = $this->getData("description");
        $this->summary = $this->getData("summary");
        $this->category = $this->getData("category");
    }

    public function getData($key) {
        $statement= $this->manager->getDataManager()->connectDatabase()->prepare(
            "SELECT " . $key . " FROM books WHERE id=:id"
        );
        $statement->execute(array(
            ':id'=>$this->id
        ));
        $value=$statement->fetch(\PDO::FETCH_ASSOC);

        return $value[$key];
    }
}