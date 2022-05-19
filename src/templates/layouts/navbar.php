<header class="navbar navbar-dark bd-navbar bg-black" style="position: sticky;
top: 0; z-index: 500;">
    <nav class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main navigation">
        <a class="navbar-brand p-0 me-2" href="." aria-label="Bebl.io">
            <img src="./assets/img/dark/brand_icon.svg" height="40px">
            <img class="mobile-hide" src="./assets/img/dark/brand_text.svg" height="40px">
        </a>
        <ul class="navbar-nav flex-row flex-wrap mx-auto">
            <li class="nav-item">
                <a class="nav-link px-2" href="."><span class="mobile-hide">Accueil</span><img class="large-hide" src="./assets/img/home.svg" height="30px"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="./?r=library"><span class="mobile-hide">Bibliothèque</span><img class="large-hide" src="./assets/img/bookmark.svg" height="30px"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="./?r=explore"><span class="mobile-hide">Explorer</span><img class="large-hide" src="./assets/img/map.svg" height="30px"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2" href="./?r=settings"><span class="mobile-hide">Réglages</span><img class="large-hide" src="./assets/img/settings.svg" height="30px"></a>
            </li>
        </ul>
        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
            <?php if(isset($_SESSION['id'])) { $user = new \sycatle\beblio\entity\User($_SESSION['id']); ?>
                <li class="nav-item col-md-auto">
                    <a class="nav-link px-2" href="./?user=<?php echo($user->getUsername()); ?>">
                        <img class="avatar-thumbnail" src="./uploads/users/<?php echo($user->getUsername()); ?>.webp" height="30px">
                    </a>
                </li>
            <?php } else { ?>
                <li class="nav-item col-md-auto">
                    <a class="nav-link px-2" href="./?r=connect">
                        Connexion
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>