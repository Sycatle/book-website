<?php

session_start();

require('./src/Manager.php');
$manager = new \sycatle\beblio\Manager();

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entities\User($_SESSION['id']) : null;

if ($user != null) {
    if (isset($_POST['settings_disconnect'])) {
        $user->redirect('./?r=disconnect');
        return;
    } else if (isset($_POST['settings_deleteuser'])) {
        $user->disconnect();
        $user->delete();
    }
}

if ($user != null) {
    require("./src/templates/pages/settings.php");
} else {
    header("Location: ./?r=connect");
}