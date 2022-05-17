<?php
namespace sycatle\beblio\models\exceptions;

class UsernameUnavailable extends RuntimeException {
   public $message = "Le nom d'utilisateur n'est pas disponible.";
}