<?php
if (!isset($_SESSION)) session_start();

require("Manager.php");
$manager = new \sycatle\beblio\Manager();
$userManager = $manager->getUserManager();

if (isset($_GET['user'])) {
    require("./views/contents/user.php");
} else {
    header("Location: .");
}
?>