<!-- Initializing Main Header-->
<nav id="mainbar">
    <div class="navbar container-fluid navbar-dark d-flex" aria-label="Main navigation">
        <div class="d-flex col-3 me-auto">
            <a class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <img src="assets/img/ham_menu.svg" alt="Menu" height="25px" width="25px" />
            </a>
            <a class="navbar-brand" href="." aria-label="Bebl.io">
                <img id="brand-icon" src="./assets/img/dark/brand_icon.svg" height="40px">
                <img id="brand-text" src="./assets/img/dark/brand_text.svg" height="40px">
            </a>
        </div>


        <div class="d-flex col-5 d-none d-md-flex">
            <?php if ($canGoBack) { ?>
                <div class="my-auto ml-auto d-flex">
                    <a href="." class="px-1" title="Retour"><img src="./assets/img/left-arrow.svg" height="25px" width="25px" alt="Retour"></a>
                </div>
            <?php }
            if ($user != null) { /* Affichage des modules uniquement si connecté. */ ?>
            <form method="GET" action="/" class="search-area input-group mx-auto">
                <input type="text" class="form-control" placeholder="Recherche par mot-clés.." required>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><img src="./assets/img/dark/search.png" height="20px"></button>
            </form>
        </div>


        <div class="d-flex">
            <div class="dropdown">
                <a class="nav-link" href="#" id="alertsDropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./assets/img/bell.svg" height="25px">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="alertsDropdownMenu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="nav-link" href="#" id="userDropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-thumbnail rounded-3" src="<?= $user->getAvatarUrl() ?>" height="30px">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="userDropdownMenu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="./?r=disconnect">Déconnexion</a></li>
                </ul>
            </div>
            <?php } else { ?>
            <button class="btn btn-secondary" title="Connexion" data-bs-toggle="modal" data-bs-target="#connectModal">
                Se connecter
            </button>
            <button class="btn btn-primary" title="Connexion" data-bs-toggle="modal" data-bs-target="#connectModal">
                Créer mon compte
            </button>
            <?php } ?>
        </div>
    </div>
</nav>