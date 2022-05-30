<!-- Initializing Main Header-->
<div class="navbar container-fluid" aria-label="Main navigation">
    <a class="navbar-brand mx-auto" href="." aria-label="Bebl.io">
        <img src="./assets/img/dark/brand_icon.svg" height="40px">
        <img src="./assets/img/dark/brand_text.svg" height="40px">
    </a>
    <?php if(isset($_SESSION["user"])) { 
     if ($_SESSION["user"]->hasPermission("access_admin")) {?>
        <a title="Accéder au panel administrateur" href="./?r=admin">
            <img src="./assets/img/admin.svg" height="25px">
        </a>
    <?php }
    }?>
</div>