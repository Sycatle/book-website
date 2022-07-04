<?php
namespace sycatle\beblio\entities;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entities/Postable.php");
use sycatle\beblio\entities\Postable;

class Author extends Postable {
    private $manager;

    private $id;
    private $name;
    private $slug;
    private $gender;
    private $description;
    private $biography;
    private $birth;
    private $authorViews;

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new Manager();
        $this->postType = 'author';

        $this->name = $this->getData($this->postType, "author_name", $this->id);
        $this->slug = $this->getData($this->postType, "author_slug", $this->id);
        $this->description = $this->getData($this->postType, "author_description", $this->id);
        $this->biography = $this->getData($this->postType, "author_biography", $this->id);
        $this->gender = $this->getData($this->postType, "author_gender_id", $this->id);
        $this->birthDate = $this->getData($this->postType, "author_birth", $this->id);
        $this->authorViews = $this->getData($this->postType, "author_views", $this->id);
    }

    public function incrementView(){
        $i = $this->getViews();
        $i++;
        $this->setData($this->postType, "author_views", $i ,$this->getId()); 
    }

    /* GETTERS */
    public function getId(){ return $this->id; }
    public function getName() { return $this->name;}
    public function getSlug() { return $this->slug; }
    public function getDescription() { return $this->description; }
    public function getBiography() { return $this->biography; }
    public function getGender() { return new Gender($this->gender); }
    public function getBirth() { return $this->birth; }
    public function getUrl() { return "./?r=author&&slug=" . $this->slug; }
    public function getImageLink(){ return "./uploads/authors/$this->slug.webp"; }
    public function getBooks() { return $this->manager->getBookManager()->getBooksByAuthor($this->getId()); }
    public function getViews() { return $this->authorViews; }

    /* SETTERS */
    public function setName($name) { $this->name = $name; }
    public function setSlug($slug) { $this->slug = $slug; }
    public function setDescription($description) { $this->description = $description; }
    public function setBiography($biography) { $this->biography = $biography; }
    public function setGender($gender_id) { $this->gender = $gender_id; }
    public function setViews($views) { $this->views = $views; }
}