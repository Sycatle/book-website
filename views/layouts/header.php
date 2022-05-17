<header class="navbar navbar-expand-md navbar-dark bd-navbar bg-black" style="position: sticky;
top: 0; z-index: 500;">
    <nav class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main navigation">
        <a class="navbar-brand p-0 me-2" href="." aria-label="Bebl.io">
            <img src="./public/img/dark/brand.svg" height="40px">
        </a>

        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bdNavbar"
            aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                </path>
            </svg>
        </button>
        <div class="navbar-collapse collapse" id="bdNavbar" style="">
            <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav pt-2 py-md-0 mx-auto">
                <li class="nav-item col-6 col-md-auto">
                    <a class="nav-link p-2" href=".">Accueil</a>
                </li>
                <li class="nav-item col-6 col-md-auto">
                    <a class="nav-link p-2" href="./?r=library">Bibliothèque</a>
                </li>
                <li class="nav-item col-6 col-md-auto">
                    <a class="nav-link p-2" href="./?r=explore">Explorer</a>
                </li>
                <li class="nav-item col-6 col-md-auto">
                    <a class="nav-link p-2" href="./?search">Rechercher</a>
                </li>
            </ul>
            <hr class="d-md-none text-white-50" />
            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <?php if(isset($_SESSION['id'])) { 
            $user = new \sycatle\beblio\models\objects\User($_SESSION['id']); ?>
                <li class="nav-item col-6 col-md-auto">
                    <a class="nav-link p-2" href="./?user=<?php echo($user->getUsername()); ?>">
                        <img class="avatar-thumbnail" src="./uploads/users/<?php echo($user->getUsername()); ?>.webp"
                            height="30px">
                        <span class="d-md-none ms-2">
                            <?php echo($user->getUsername()); ?>
                        </span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="nav-item col-6 col-md-auto">
                    <a class="nav-link p-2" href="./?r=connect">
                        Connexion
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>

<!-- <nav class="navbar navbar-dark">
  <div class="container">
    <a title="Retour" href=".">
      <img src="./public/img/left-arrow.svg" height="20px" />
    </a>
    <span class="mx-auto"><?php echo($pageTitle); ?></span>

    <div class="right d-flex">
        <form name="search">
            <div class="input-group">
                <div class="form-floating">
                    <input name="search" type="text" class="form-control" id="floatingInput" placeholder="Livre, auteur, utilisateur.." required>
                    <label for="floatingInput">Rechercher</label>
                </div>
                <button for="form-floating" type="submit"><img src="./public/img/explore.svg" height="20px"></button>
            </div>
        </form>
      <?php if(isset($_SESSION['id'])) {?>
        <a title="Accéder aux alertes" href="./?r=notifications">
            <img src="./public/img/bell.svg" height="20px" />
        </a>
        <a href="?user=<?php echo($user->getUsername()); ?>">
            <img
            id="thumb-avatar"
            src="./uploads/users/<?php echo($user->getUsername()); ?>.webp"
            height="30px"
            />
            <span class="nav-text"><?php echo($user->getFirstname()); ?></span>
        </a>
      <?php } else {  ?>
            <a href="./?r=connect">
                <img src="./public/img/dark/login.png" height="30px">
                <span class="nav-text">Connexion</span>
            </a>
      <?php } ?>
    </div>
  </div>
</nav> -->

<!--     <main class="col-lg-10 col-sm-11 col-xs-11">
        <nav id="mainbar">
            <div class="main-items">
                <a class="slot" title="Retour" href=".">
                    <img src="./public/img/left-arrow.svg" height="20px">
                </a>
                <h2></h2>
            </div>
                <div class="main-items right">
                    <?php if(isset($_SESSION['id'])) {?>
                        <a class="slot" title="Accéder aux alertes" href="./?r=notifications">
                            <img src="./public/img/bell.svg" height="20px">
                        </a>
                        <a class="slot" href="?user=<?php echo($user->getUsername()); ?>">
                            <img id="thumb-avatar" src="./uploads/users/<?php echo($user->getUsername()); ?>.webp" height="30px"> <span class="nav-text"><?php echo($user->getFirstname()); ?></span>
                        </a>
                     <?php } else {  ?>
                        <a class="slot right" href="./?r=connect"><img src="./public/img/dark/login.png" height="30px"> <span class="nav-text">Connexion</span></a>
                    <?php } ?>
                </div>
        </nav>
    </main> -->