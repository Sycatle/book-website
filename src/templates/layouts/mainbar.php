<!-- Initializing Main Header-->
<div class="navbar container-fluid" aria-label="Main navigation">
    <a class="navbar-brand mr-auto" href="." aria-label="Bebl.io">
        <img id="brand-icon" src="./assets/img/dark/brand_icon.svg" height="40px">
        <img id="brand-text" src="./assets/img/dark/brand_text.svg" height="40px">
    </a>
    <div class=" d-flex">   
        <button class="light-switch" title="Changer le thème" class="mx-1" onclick="toggleLight()">
            <img src="./assets/img/dark/moon.png" height="20px">
        </button>
        <?php if ($user != null) { ?>
            <?php if ($user->hasPermission("access_admin")) { ?>
                <a class="nav-link" title="Accéder au panel administrateur" href="./?r=admin">
                    <img src="./assets/img/admin.svg" height="25px">
                </a>
            <?php } ?>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./assets/img/bell.svg" height="25px">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-thumbnail" src="./uploads/users/<?php echo ($user->getUsername()); ?>.webp" height="30px">
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