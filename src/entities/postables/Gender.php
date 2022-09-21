<?php
namespace sycatle\beblio\entities;

require_once("Manager.php");
use sycatle\beblio\Manager;
require_once("entities/Postable.php");
use sycatle\beblio\entities\Postable;

class Gender extends Postable {
    private $manager;

    private $id;
    private $name;
    private $slug;
    private $description;
    private $color;

    function __construct(int $id){
        $this->manager = new Manager();
        $this->postType = 'gender';

        $this->id = $id;
        $this->name = $this->getData($this->postType, "gender_name", $this->id);
        $this->slug = $this->getData($this->postType, "gender_slug", $this->id);
        $this->description = $this->getData($this->postType, "gender_description", $this->id);
        $this->color = $this->getData($this->postType, "gender_color", $this->id);
    }

    /* GETTERS */
    public function getId(){ return $this->id; }
    public function getName() { return $this->name;}
    public function getSlug() { return $this->slug; }
    public function getDescription() { return $this->description; }
    public function getColor() { return $this->color; }
    public function getUrl() { return "./?r=gender&slug=" . $this->slug; }

    /* SETTERS */
    public function setName($name) { $this->name = $name; }
    public function setSlug($slug) { $this->slug = $slug; }
    public function setDescription($description) { $this->description = $description; }
    public function setColor($color) { $this->color = $color; }
}