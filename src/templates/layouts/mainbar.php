<!-- Initializing Main Header-->
<div class="navbar container-fluid" aria-label="Main navigation">
    <a class="navbar-brand mx-auto" href="." aria-label="Bebl.io">
        <img id="brand-icon" src="./assets/img/dark/brand_icon.svg" height="40px">
        <img id="brand-text" src="./assets/img/dark/brand_text.svg" height="40px">
    </a>
    <button class="light-switch" title="Changer le thème" class="mx-1" onclick="toggleLight()">
        <img src="./assets/img/dark/moon.png" height="20px">
    </button>
    <?php if($user != null) {
     if ($user->hasPermission("access_admin")) {?>
        <a title="Accéder au panel administrateur" href="./?r=admin">
            <img src="./assets/img/admin.svg" height="25px">
        </a>
    <?php }
    }?>
</div>