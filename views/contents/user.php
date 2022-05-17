<?php
require_once("./models/objects/User.php");
$viewUser = $userManager->getByUsername($_GET['user']);
if ($viewUser == null) header("Location: ./?error=404");

$viewUserId = $viewUser->getData('user_id');
$viewUsername = $viewUser->getData('user_username');
$viewFirstname = $viewUser->getData('user_firstname');
$viewLastname = $viewUser->getData('user_lastname');
$viewBiography = $viewUser->getData('user_biography');
$viewJoinDate = $viewUser->getData('user_joindate');

$pageTitle = "Profil de " . $viewUsername;

ob_start(); 
?>

<section id="user-profile" class="container-fluid">
    <div id="user-banner">
        <img src="./uploads/users/banners/<?php echo($viewUsername); ?>.gif">
    </div>
    <img id="user-avatar" src="./uploads/users/<?php echo($viewUsername); ?>.webp">
    <div id="user-names">
        <span class="firstname"><?php echo($viewFirstname); ?> 
        <span class="username">@<?php echo($viewUsername); ?>
    </div>
    <div id="biography">
        <span><?php echo($viewBiography); ?></span>
    </div>
    <div id="join-date">
        <span>Arrivé le <?php echo($viewJoinDate); ?></span>
    </div>
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>