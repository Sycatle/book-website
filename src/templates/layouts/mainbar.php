<!-- Initializing Main Header-->
<div class="navbar container-fluid navbar-dark" aria-label="Main navigation">
    <button type="nav-link navbar-toggler" data-bs-toggle="collapse" data-bs-target="#leftbar" aria-expanded="false" aria-controls="leftbar">
        <img src="assets/img/ham_menu.svg" alt="Menu" height="25px">
    </button>
    <a class="navbar-brand" href="." aria-label="Bebl.io">
        <img id="brand-icon" src="./assets/img/dark/brand_icon.svg" height="40px">
        <img id="brand-text" src="./assets/img/dark/brand_text.svg" height="40px">
    </a>
    <?php if ($canGoBack) { ?>
        <div class="nav-area mx-auto">
            <a href="."><img src="./assets/img/left-arrow.svg" height="20px"></a>
            <span id="page-title"> <?= isset($pageTypeName) ? $pageTypeName : $pageTitle ?> </span>
        </div>
    <?php } ?>

    <div class="d-flex mx-auto">
        <form method="GET" action="/" class="search-area col-4 input-group">
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
                    <img class="avatar-thumbnail" src="./uploads/users/<?= $user->getUsername() ?>.webp" height="30px">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="./?r=disconnect">Déconnexion</a></li>
                </ul>
            </div>
        <?php } else { ?>
            <a class="nav-link px-1" href="./?r=connect">
                Connexion
            </a>
        <?php } ?>
    </div>
</div>