<?php
namespace sycatle\beblio\entities;

require_once("Manager.php");
use sycatle\beblio\Manager;
require_once("entities/Postable.php");
use sycatle\beblio\entities\Postable;
require_once("entities/postables/Gender.php");
use sycatle\beblio\entities\Gender;
require_once("entities/postables/Author.php");
use sycatle\beblio\entities\Author;

class Book extends Postable {
    private $manager;

    private $bookId;
    private $title;
    private $authorId;
    private $slug;
    private $description;
    private $summary;
    private $parutionDate;
    private $genderId;
    private $bookViews;

    function __construct(int $bookId){
        $this->bookId = $bookId;
        $this->manager = new Manager();
        $this->postType = 'book';

        $this->title = $this->getData($this->postType, "book_title", $this->bookId);
        $this->authorId = $this->getData($this->postType, "book_author_id", $this->bookId);
        $this->slug = $this->getData($this->postType, "book_slug", $this->bookId);
        $this->description = $this->getData($this->postType, "book_description", $this->bookId);
        $this->parutionDate = $this->getData($this->postType, "book_parution", $this->bookId);
        $this->pages = $this->getData($this->postType, "book_pages", $this->bookId);
        $this->summary = $this->getData($this->postType, "book_summary", $this->bookId);
        $this->genderId = $this->getData($this->postType, "book_gender_id", $this->bookId);
        $this->bookViews = $this->getData($this->postType, "book_views", $this->bookId);
    }

    public function incrementView() {
        $i = $this->getViews();
        $i++;
        $this->setData($this->postType, "book_views", $i ,$this->getId()); 
    }

    /* GETTERS */
    public function getId(){ return $this->bookId; }
    public function getTitle() { return $this->title;}
    public function getSlug() { return $this->slug; }
    public function getAuthor() { return new Author($this->authorId); }
    public function getDescription() { return $this->description; }
    public function getPages() { return $this->pages; }
    public function getSummary() { return $this->summary; }
    public function getParutionDate() { return $this->parutionDate; }
    public function getGender() { return new Gender($this->genderId); }
    public function getUrl() { return "./?r=book&slug=" . $this->slug; }
    public function getCoverLink(){ return "./uploads/books/$this->slug.webp"; }
    public function getViews() { return $this->bookViews; }

    /* SETTERS */
    public function setTitle($title) { $this->title = $title; }
    public function setSlug($slug) { $this->slug = $slug; }
    public function setAuthor($author_id) { $this->author = $author_id; }
    public function setDescription($description) { $this->description = $description; }
    public function setSummary($summary) { $this->summary = $summary; }
    public function setGender($gender_id) { $this->gender = $gender_id; }
    public function setViews($bookViews) { $this->bookViews = $bookViews; }
}