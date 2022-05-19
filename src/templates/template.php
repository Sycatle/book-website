<!DOCTYPE html>
<html>
  <head>
    <title><?= $pageTitle . " | bebl.io" ?></title>
    <link
      rel="icon"
      type="image/x-icon"
      href="./assets/img/light/brand_icon.svg"
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
    <script src="./dist/js/scripts.js"></script>
    <!-- SCRIPT END -->

    <!-- STYLE.CSS START -->
    <link rel="stylesheet" type="text/css" href="./dist/css/style.min.css" />
    <!-- STYLE.CSS END -->
  </head>
  
  <div class="main-content container-fluid">
    <?php include("layouts/mainbar.php"); ?>
    <div id="page-content" class="d-flex flex-row">
      <nav id="leftbar" class="col-lg-2 col-sm-1 col-xs-1 d-flex">
        <?php include("layouts/leftbar.php"); ?>
      </nav>
      <div class="col-lg-10 col-sm-11 col-xs-11">
        <nav id="pagebar" class="col-lg-2 col-sm-1 col-xs-1 d-flex">
          <?php include("layouts/navbar.php"); ?>
        </nav>
        <?= $content ?>
      </div>
    </div>
  </div>
</html>

