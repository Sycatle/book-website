<?php
namespace sycatle\beblio\managers;

use sycatle\beblio\Manager;

class FormManager extends Manager {

    public function safeFormat($form_value) : String {
        return htmlspecialchars(trim(stripslashes($form_value)));
    }

    public function toSlug($string) : String {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $string))))), '-'));
        return $slug;
    }

    public function encrypt(String $data) : String{
        return hash('sha256', $data);
    }

    public function decrypt(String $data) : String {
        return hash('sha256', $data);
    }
}