<!-- Initializing Main Header-->
<header class="navbar navbar-dark bd-navbar bg-black" style="position: sticky; top: 0; z-index: 500;">
    <nav class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main navigation">
        <a class="navbar-brand p-0 me-2" href="." aria-label="Bebl.io">
            <img src="./assets/img/dark/brand_icon.svg" height="40px">
            <img class="mobile-hide" src="./assets/img/dark/brand_text.svg" height="40px">
        </a>
        <?php if(isset($_SESSION['id'])) { $user = new \sycatle\beblio\entity\User($_SESSION['id']); ?>
            <div class="mx-auto"></div>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./assets/img/bell.svg" height="25px">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-thumbnail" src="./uploads/users/<?php echo($user->getUsername()); ?>.webp" height="30px">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        <?php } else { ?>
                <a class="nav-link px-2" href="./?r=connect">
                    Connexion
                </a>
        <?php } ?>
    </nav>
</header>