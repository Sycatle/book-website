<?php
namespace sycatle\beblio\models\utils;

class Crypt{
    public function encrypt(String $data) : String{
        return hash('sha256', $data);
    }

    public function decrypt(String $data) : String {
        return hash('sha256', $data);
    }
}