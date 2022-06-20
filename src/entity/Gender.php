<?php
namespace sycatle\beblio\entity;

require_once("./src/Manager.php");
use sycatle\beblio\Manager;
require_once("./src/entity/Post.php");
use sycatle\beblio\entity\Post;

class Gender extends Post {
    private $manager;

    private $id;
    private $name;
    private $slug;
    private $description;
    private $color;

    function __construct(int $id){
        $this->id = $id;
        $this->manager = new Manager();

        $this->name = $this->getData("gender_name");
        $this->slug = $this->getData("gender_slug");
        $this->description = $this->getData("gender_description");
        $this->color = $this->getData("gender_color");
    }

    public function getData($key) {
        $sqlRequest = "SELECT " . $key . " FROM genders WHERE gender_id=:gender_id";

        $statement= $this->manager->getDataManager()->connectDatabase()->prepare($sqlRequest);
        $statement->execute(array(':gender_id'=>$this->id));
        $value=$statement->fetch(\PDO::FETCH_ASSOC);

        return $value[$key];
    }

    /* GETTERS */
    public function getId(){ return $this->id; }
    public function getName() { return $this->name;}
    public function getSlug() { return $this->slug; }
    public function getDescription() { return $this->description; }
    public function getColor() { return $this->color; }

    /* SETTERS */
    public function setName($name) { $this->name = $name; }
    public function setSlug($slug) { $this->slug = $slug; }
    public function setDescription($description) { $this->description = $description; }
    public function setColor($color) { $this->color = $color; }
}