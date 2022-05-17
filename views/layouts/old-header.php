<style>
    .navbar {
        transition-duration: 500ms
    }
</style>

<nav id="left-nav" class="d-flex flex-column">
    <a class="navbar-brand" href="."><img src="./public/img/brand_light.png" height="35px"></a>
</nav>

<nav class="navbar d-flex flex-column navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="."><img src="./public/img/brand_light.png" height="35px"></a>
        <ul class="navbar-nav mx-auto">
        </ul>
        <a class="btn btn-light mx-1 my-2 my-sm-0" title="Rechercher"><img src="./public/img/search.png" height="20px"></a>
        <a class="btn btn-light mx-1 my-2 my-sm-0" href="./?r=post" title="Poster"><img src="./public/img/plus.png" height="20px"></a>
        <?php if(isset($_SESSION["user"])){
            $user = new \sycatle\beblio\models\objects\User(($_SESSION["id"]));?>
            <div class="dropdown">
                <a class="btn btn-light mx-1 my-2 my-sm-0" title="Accéder aux alertes" data-toggle="dropdown"><img src="./public/img/notification.png" height="20px"></a>
                <div class="dropdown-menu"><a class="dropdown-item" href="./alerts.php">Dernières alertes</a></div>
            </div>
            <?php if ($user->hasPermission("access_admin")) {?>
                <a class="btn btn-light mx-1 my-2 my-sm-0" title="Accéder au panel administrateur" href="./?r=admin"><img src="./public/img/admin.png" height="20px"></a>
            <?php } ?>
            <div class="dropdown">
                <a class="btn btn-light mx-1 my-2 my-sm-0 dropdown-toggle" title="Accéder au profil" data-toggle="dropdown">
                    <img id="thumb-avatar" src="./uploads/users/<?php echo($user->getUsername()); ?>.webp" height="20px"> <?php echo($user->getFirstname()); ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="./?user=<?php echo($user->getUsername()); ?>">Accéder à mon profil</a>
                    <a class="dropdown-item" href="./subscribe.php">Passer au Premium</a>
                    <a class="dropdown-item light-switch" title="Thème clair/sombre">Thème clair/sombre</a>
                    <a class="dropdown-item" href="settings.php">Langue</a>
                    <a class="dropdown-item" href="./?r=settings">Paramètres</a>
                    <a class="dropdown-item" href="./?r=disconnect"><img src="./public/img/logout.png" height="20px"> Se déconnecter</a>
                </div>
            </div>
            <?php
            } else {  ?>
                <a class="btn btn-light mx-1 my-2 my-sm-0" href="./?r=connect" type="submit" title="Se connecter"><img
                        src="./public/img/login.png" height="20px"> Connexion</a>
        <?php } ?>
    </div>
</nav>