<?php
namespace sycatle\beblio\entities;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entities/Postable.php");
use sycatle\beblio\entities\Postable;

class Quote extends Postable {
    private $manager;

    private $id;
    private $name;
    private $slug;
    private $gender;
    private $description;
    private $biography;
    private $birth;

    function __construct(int $id){
        $this->manager = new Manager();
        $this->postType = 'quote';

        $this->id = $id;
        $this->text = $this->getData($this->postType, "quote_text", $this->id);
        $this->slug = $this->getData($this->postType, "quote_slug", $this->id);
        $this->author = $this->getData($this->postType, "quote_author_id", $this->id);
        $this->gender = $this->getData($this->postType, "quote_gender_id", $this->id);
    }

    /* GETTERS */
    public function getId(){ return $this->id; }
    public function getName() { return $this->name;}
    public function getSlug() { return $this->slug; }
    public function getDescription() { return $this->description; }
    public function getBiography() { return $this->summary; }
    public function getGender() { return new Gender($this->gender); }
    public function getUrl() { return "./?r=quote&&slug=" . $this->slug; }

    /* SETTERS */
    public function setName($name) { $this->name = $name; }
    public function setSlug($slug) { $this->slug = $slug; }
    public function setDescription($description) { $this->description = $description; }
    public function setBiography($biography) { $this->biography = $biography; }
    public function setGender($gender_id) { $this->gender = $gender_id; }
}