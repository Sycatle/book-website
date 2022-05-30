<?php
namespace sycatle\beblio;
require("./src/Manager.php");

class Controller{
    private $manager;
    private $templatePage;
    public $user;

    private $scripts = [];
    private $links = [];
    private $permissions = [];

    public function __construct(){
        if ($_SESSION['id'] != null)
            $this->user = new \sycatle\beblio\entity\User($_SESSION['id']);

        if ($this->permission != null || !$this->user->hasPermission($this->permission)) {
            header('Location: ./?r=error=404');
        }
    }

    public function getUser(){
        return $this->user;
    }

    public function getManager() {
        if ($this->manager == null) $this->manager = new Manager();
        
        return $this->manager;
    }

    public function initTemplate(String $template){
        $this->templatePage = $template;
    }

    public function showTemplatePage(){
        if ($this->templatePage == null) throw new \Exception("No template page asigned into this controller");

        require($this->templatePage);
    }

    public function setLinks(array $links){
        $this->links = $links;
    }

    public function addLinks(array $links){
        $this->links = array_push($this->links, $links);
    }

    public function getLinks(){
        return $this->links;
    }

    public function setScripts(array $scripts){
        $this->scripts = $scripts;
    }

    public function addScripts(array $scripts){
        $this->scripts = array_push($this->scripts, $scripts);
    }

    public function getScripts(){
        return $this->scripts;
    }

    public function addPermission($permission){
        $this->permissions = array_push($permission, $this->permissions);
    }
}