<nav id="leftbar" class="col-lg-2 col-sm-1 col-xs-1">
    <!-- NAVBAR BRAND -->
    <span class="navbar-brand">
        <img class="brand-image mx-auto" src="./public/img/dark/brand_icon.svg" height="40px">
        <img class="brand-text" src="./public/img/dark/brand_text.svg" height="40px">
    </span>

    <?php if($_SESSION['id'] != null) {
        $user = new \sycatle\beblio\models\objects\User($_SESSION['id']); ?>
        <!-- NAV BAR ITEMS -->
        <div class="left-items">
            <a class="slot" title="Acceuil" href=".">
                <img src="./public/img/home.svg" height="25px">
                <span class="nav-text">Accueil</span>
            </a>
            <a class="slot" title="Bibliothèque" href="./?r=library">
                <img src="./public/img/bookmark.svg" height="25px">
                <span class="nav-text">Bibliothèque</span>
            </a>
            <a class="slot" title="Explorer" href="./?r=explore">
                <img src="./public/img/map.svg" height="25px">
                <span class="nav-text">Explorer</span>
            </a>
            <a class="slot" title="Réglages" href="./?r=settings">
                <img src="./public/img/settings.svg" height="25px">
                <span class="nav-text">Réglages</span>
            </a>
            <a class="slot" title="Poster" href="./?r=post">
                <img src="./public/img/post.svg" height="25px">
                <span class="nav-text">Poster</span>
            </a>
        <?php if ($user->hasPermission("access_admin")) {?>
            <a class="slot" title="Accéder au panel administrateur" href="./?r=admin">
                <img src="./public/img/admin.svg" height="25px"> <span class="nav-text">Admin</span>
            </a>
        <?php } ?>
        </div>
    <?php } ?>
    <div class="left-items bottom">
        <a class="slot light-switch">
            <img src="./public/img/dark/moon.png" height="20px"> <span class="nav-text">Mode sombre</span>
        </a>
    </div>
</nav>