<?php
namespace sycatle\beblio\entity;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entity/Post.php");
use sycatle\beblio\entity\Post;
require_once("./src/entity/Gender.php");
use sycatle\beblio\entity\Gender;
require_once("./src/entity/Author.php");
use sycatle\beblio\entity\Author;

class Book extends Post {
    private $manager;

    private $id;
    private $title;
    private $author;
    private $slug;
    private $description;
    private $summary;
    private $parution;
    private $gender;

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new Manager();

        $this->title = $this->getData("book_title");
        $this->author = $this->getData("book_author_id");
        $this->slug = $this->getData("book_slug");
        $this->description = $this->getData("book_description");
        $this->parutionDate = $this->getData("book_parution");
        $this->summary = $this->getData("book_summary");
        $this->gender = $this->getData("book_gender_id");
    }

    public function getData($key) {
        $sqlRequest = "SELECT " . $key . " FROM books WHERE book_id=$this->id";
        $statement= $this->manager->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute();
        $value=$statement->fetch(\PDO::FETCH_ASSOC);

        return $value[$key];
    }

    /* GETTERS */
    public function getId(){ return $this->id; }
    public function getTitle() { return $this->title;}
    public function getSlug() { return $this->slug; }
    public function getAuthor() { return new Author($this->author); }
    public function getDescription() { return $this->description; }
    public function getSummary() { return $this->summary; }
    public function getParutionDate() { return $this->parutionDate; }
    public function getGender() { return new Gender($this->gender); }
    public function getCoverLink(){ return "./uploads/books/$this->slug.webp"; }

    /* SETTERS */
    public function setTitle($title) { $this->title = $title; }
    public function setSlug($slug) { $this->slug = $slug; }
    public function setAuthor($author_id) { $this->author = $author_id; }
    public function setDescription($description) { $this->description = $description; }
    public function setSummary($summary) { $this->summary = $summary; }
    public function setGender($gender_id) { $this->gender = $gender_id; }
}