<?php
namespace sycatle\beblio\utils;

class Format{



    public function safeFormat($form_value) {
        return htmlspecialchars(trim(stripslashes($form_value)));
    }

    public function format($data){
        return htmlspecialchars(stripslashes('sha256', $data));
    }

    public function createSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    
    } 
}