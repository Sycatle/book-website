<!DOCTYPE html>
<html>
  <head>
    <title><?= $pageTitle . " | bebl.io" ?></title>
    <link
      rel="icon"
      type="image/x-icon"
      href="./public/img/light/brand_icon.svg"
    />

    <!-- BOOTSTRAP START -->
    <link
      href="./node_modules/bootstrap/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP END -->
    <!-- JQUERY START -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- JQUERY END -->
    <!-- FLICKITY START -->
    <link
      href=".\node_modules\flickity\dist\flickity.min.css"
      rel="stylesheet"
    />
    <script src=".\node_modules\flickity\dist\flickity.pkgd.min.js"></script>
    <!-- FLICKITY END -->

    <!-- SCRIPT START -->
    <script src="./public/js/scripts.js"></script>
    <!-- SCRIPT END -->

    <!-- STYLE.CSS START -->
    <link rel="stylesheet" type="text/css" href="./public/css/style.css" />
    <!-- STYLE.CSS END -->
  </head>

  <?php if($_SESSION['id'] != null)
    $user = new \sycatle\beblio\models\objects\User($_SESSION['id']); ?>

<!--   <nav id="leftbar" class="col-lg-2 col-sm-1 col-xs-1">
    <span class="navbar-brand">
      <img
        class="brand-image mx-auto"
        src="./public/img/dark/brand_icon.svg"
        height="40px"
      />
      <img
        class="brand-text"
        src="./public/img/dark/brand_text.svg"
        height="40px"
      />
    </span>

    <div class="left-items">
      <a class="slot" title="Acceuil" href=".">
        <img src="./public/img/home.svg" height="25px" />
        <span class="nav-text">Accueil</span>
      </a>
      <a class="slot" title="Bibliothèque" href="./?r=library">
        <img src="./public/img/bookmark.svg" height="25px" />
        <span class="nav-text">Bibliothèque</span>
      </a>
      <a class="slot" title="Explorer" href="./?r=explore">
        <img src="./public/img/map.svg" height="25px" />
        <span class="nav-text">Explorer</span>
      </a>
      <a class="slot" title="Réglages" href="./?r=settings">
        <img src="./public/img/settings.svg" height="25px" />
        <span class="nav-text">Réglages</span>
      </a>
      <a class="slot" title="Poster" href="./?r=post">
        <img src="./public/img/post.svg" height="25px" />
        <span class="nav-text">Poster</span>
      </a>
      <?php /* if ($user->hasPermission("access_admin")) {?>
      <a class="slot" title="Accéder au panel administrateur" href="./?r=admin">
        <img src="./public/img/admin.svg" height="25px" />
        <span class="nav-text">Admin</span>
      </a>
      <?php } */ ?>
    </div>
    <div class="left-items bottom">
      <a class="slot light-switch">
        <img src="./public/img/dark/moon.png" height="20px" />
        <span class="nav-text">Mode sombre</span>
      </a>
    </div>
  </nav> -->
    <div class="main-content container-fluid">
      <?php include("header.php"); ?>
      <?= $content ?>
    </div>
</html>
