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
    <nav id="mainbar">
      <?php include("layouts/mainbar.php"); ?>
    </nav>
    <div id="page-content" class="d-flex flex-row">


      <nav id="leftbar" class="col-1 col-lg-2 d-flex">
        <?php include("layouts/leftbar.php"); ?>
      </nav>


      <div class="col-11 col-lg-10">
        <nav id="pagebar">
          <?php include("layouts/pagebar.php"); ?>
        </nav>
        <?= $content ?>
      </div>
    </div>
  </div>
</html>

