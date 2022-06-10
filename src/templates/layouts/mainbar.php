<!-- Initializing Main Header-->
<nav id="mainbar">
    <div class="navbar container-fluid navbar-dark" aria-label="Main navigation">
        <div class="d-flex col-3">
            <a class="nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#leftbar" aria-expanded="false" aria-controls="leftbar">
                <img src="assets/img/ham_menu.svg" alt="Menu" height="25px" width="25px" />
            </a>
            <a class="navbar-brand" href="." aria-label="Bebl.io">
                <img id="brand-icon" src="./assets/img/dark/brand_icon.svg" height="40px">
                <img id="brand-text" src="./assets/img/dark/brand_text.svg" height="40px">
            </a>
            <?php if ($canGoBack) { ?>
                <div class="nav-area mx-3">
                    <a href="."><img src="./assets/img/left-arrow.svg" height="25px" width="25px"></a>
                    <span id="page-title"> <?= isset($pageTypeName) ? $pageTypeName : $pageTitle ?> </span>
                </div>
            <?php } ?>
        </div>


        <div class="d-flex col-9">
            <form method="GET" action="/" class="search-area input-group">
                <input type="text" class="form-control" placeholder="Recherche par mot-clés.." required>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><img src="./assets/img/dark/search.png" height="20px"></button>
            </form>
            <div id="light-switch" class="nav-link" title="Changer le thème" class="mx-1">
                <img id="light-switch-icon" src="./assets/img/dark/moon.png" height="20px">
            </div>
            <?php if ($user != null) { ?>
                <div class="dropdown">
                    <a class="nav-link" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/bell.svg" height="25px">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a class="nav-link" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="avatar-thumbnail" src="<?= $user->getAvatarUrl() ?>" height="30px">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="./?r=disconnect">Déconnexion</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <button class="btn btn-primary" title="Connexion" data-bs-toggle="modal" data-bs-target="#connectModal">
                    Rejoindre
                </button>
            <?php } ?>
        </div>
    </div>
</nav>