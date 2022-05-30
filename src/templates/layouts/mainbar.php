<!-- Initializing Main Header-->
<div class="navbar container-fluid" aria-label="Main navigation">
    <a class="navbar-brand mx-auto" href="." aria-label="Bebl.io">
        <img src="./assets/img/dark/brand_icon.svg" height="40px">
        <img src="./assets/img/dark/brand_text.svg" height="40px">
    </a>
    <a class="light-switch" title="Changer le thème" class="mx-1">
        <img src="./assets/img/dark/moon.png" height="20px">
    </a>
    <?php if($user != null) { $user = new \sycatle\beblio\entity\User($_SESSION['id']);
     if ($user->hasPermission("access_admin")) {?>
        <a title="Accéder au panel administrateur" href="./?r=admin" class="mx-1">
            <img src="./assets/img/admin.svg" height="25px">
        </a>
    <?php }
    }?>
</div>