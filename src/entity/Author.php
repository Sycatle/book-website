<?php
namespace sycatle\beblio\entity;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entity/Post.php");
use sycatle\beblio\entity\Post;

class Author extends Post {
    private $manager;

    private $id;
    private $name;
    private $slug;
    private $gender;
    private $description;
    private $biography;
    private $birth;

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new Manager();

        $this->name = $this->getData("author_name");
        $this->slug = $this->getData("author_slug");
        $this->description = $this->getData("author_description");
        $this->biography = $this->getData("author_biography");
        $this->gender = $this->getData("author_gender_id");
    }

    public function getData($key) {
        $statement= $this->manager->getDataManager()->connectDatabase()->prepare(
            "SELECT " . $key . " FROM authors WHERE author_id=:author_id"
        );
        $statement->execute(array(
            ':author_id'=>$this->id
        ));
        $value=$statement->fetch(\PDO::FETCH_ASSOC);

        return $value[$key];
    }

    /* GETTERS */
    public function getId(){ return $this->id; }
    public function getName() { return $this->name;}
    public function getSlug() { return $this->slug; }
    public function getDescription() { return $this->description; }
    public function getBiography() { return $this->summary; }
    public function getGender() { return new Gender($this->gender); }
    public function getImageLink(){ return "./uploads/authors/$this->slug.webp"; }
    public function getBooks() { /* UNFINISHED */ return $this->manager->getBookManager()->getBooksByAuthor($this->getId()); }

    /* SETTERS */
    public function setName($name) { $this->name = $name; }
    public function setSlug($slug) { $this->slug = $slug; }
    public function setDescription($description) { $this->description = $description; }
    public function setBiography($biography) { $this->biography = $biography; }
    public function setGender($gender_id) { $this->gender = $gender_id; }
}