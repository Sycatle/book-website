<?php 

if($_SESSION['id'] != null) { $user = new \sycatle\beblio\entity\User($_SESSION['id']); ?>
    <!-- NAV BAR ITEMS -->
    <div class="left-items">
        <a class="slot" title="Acceuil" href=".">
            <img src="./assets/img/home.svg" height="25px">
            <span class="nav-text">Accueil</span>
        </a>
        <a class="slot" title="Bibliothèque" href="./?r=library">
            <img src="./assets/img/bookmark.svg" height="25px">
            <span class="nav-text">Bibliothèque</span>
        </a>
        <a class="slot" title="Explorer" href="./?r=explore">
            <img src="./assets/img/map.svg" height="25px">
            <span class="nav-text">Explorer</span>
        </a>
        <a class="slot" title="Réglages" href="./?r=settings">
            <img src="./assets/img/settings.svg" height="25px">
            <span class="nav-text">Réglages</span>
        </a>
        <a class="slot" title="Poster" href="./?r=post">
            <img src="./assets/img/post.svg" height="25px">
            <span class="nav-text">Poster</span>
        </a>
        <?php if ($user->hasPermission("access_admin")) {?>
        <a class="slot" title="Accéder au panel administrateur" href="./?r=admin">
            <img src="./assets/img/admin.svg" height="25px"> <span class="nav-text">Admin</span>
        </a>
        <?php } ?>
<?php } ?>
    <a class="slot light-switch bottom">
        <img src="./assets/img/dark/moon.png" height="20px"> <span class="nav-text">Mode sombre</span>
    </a>
    <div>
</div>