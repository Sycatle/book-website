<?php
// Initialisation des variables:
$pageTitle;
$pageDescription;
$pageTypeName;

$user = isset($_SESSION['id']) ? new \sycatle\beblio\entity\User($_SESSION['id']) : null; ?>

<!DOCTYPE html>
<html>

<head>
  <title><?= $pageTitle . " | bebl.io" ?></title>
  <link rel="icon" type="image/x-icon" href="./assets/img/light/brand_icon.svg" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= $pageDescription ?>">

  <!-- BOOTSTRAP START -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- BOOTSTRAP END -->
  <!-- JQUERY START -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <!-- JQUERY END -->
  <!-- FLICKITY START -->
  <link href=".\node_modules\flickity\dist\flickity.min.css" rel="stylesheet" />
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
      <nav id="pagebar" class="container">
        <?php include("layouts/pagebar.php"); ?>
      </nav>
      <?= $content ?>
    </div>
  </div>
</div>

</html>