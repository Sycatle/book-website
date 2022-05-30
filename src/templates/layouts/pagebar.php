<?php if ($canGoBack) { ?>
    <a href="."><img src="./assets/img/left-arrow.svg" height="20px"></a>
<?php } ?>
<span id="page-title"> <?php echo(isset($pageTypeName) ? $pageTypeName : $pageTitle); ?> </span>
<div id="search-bar" class="justify-content-center">
    <form action="" autocomplete="on">
        <input id="search" name="search" type="text" placeholder="Que recherchez-vous?" required><input id="search_submit" value="Rechercher" type="submit">
    </form>
</div>
<?php if($user != null) { ?>
<div class="right d-flex">
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
</div>