    <main class="col-lg-10 col-sm-11 col-xs-11">
        <nav id="mainbar">
            <div class="main-items">
                <a class="slot" title="Retour" href=".">
                    <img src="./public/img/left-arrow.svg" height="20px">
                </a>
                <h2><?php echo($pageTitle); ?></h2>
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
    </main>