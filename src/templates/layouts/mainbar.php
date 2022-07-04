<!-- Initializing Main Header-->
<nav id="mainbar">
    <div class="navbar container-fluid navbar-dark d-flex" aria-label="Main navigation">
        <div class="d-flex">
            <!-- <a class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <img src="assets/img/ham_menu.svg" alt="Menu" height="25px" width="25px" />
            </a> -->
            <button class="navbar-toggler ms-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left align-middle me-2">
                    <line x1="17" y1="10" x2="3" y2="10"></line>
                    <line x1="21" y1="6" x2="3" y2="6"></line>
                    <line x1="21" y1="14" x2="3" y2="14"></line>
                    <line x1="17" y1="18" x2="3" y2="18"></line>
                </svg>
            </button>
            <a class="navbar-brand" href="." aria-label="Bebl.io">
                <img id="brand-icon" src="./assets/img/dark/brand_icon.svg" height="40px">
                <img id="brand-text" src="./assets/img/dark/brand_text.svg" height="40px">
            </a>
        </div>


        <div class="d-flex col-5 mx-auto d-none d-md-flex">
            <?php if ($canGoBack) { ?>
                <div class="my-auto ml-auto d-flex">
                    <a href="." class="px-1" title="Retour">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    </a>
                </div>
            <?php }
            if ($user != null) { /* Affichage des modules uniquement si connecté. */ ?>
                <form method="GET" action="?search" class="search-area input-group mx-auto">
                    <input type="text" class="form-control" placeholder="Recherche par mot-clés.." required>
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle me-2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form>
        </div>

        <div class="btn-group ms-auto">
            <a href="#" class="text-white text-decoration-none mx-3" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="usericon"><img class="avatar-thumbnail rounded-circle" src="<?= $user->getAvatarUrl() ?>" height="35" width="35"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-light">
                <li><a class="dropdown-item" href="#">Thème</a></li>
                <li>
                    <a class="dropdown-item" href="./?r=settings">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle me-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        Réglages
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="./?r=logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out align-middle me-2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <!-- <div class="dropdown">
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
            </div> -->
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