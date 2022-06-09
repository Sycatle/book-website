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

  <!-- TAILWIND CSS START -->
  <!--
  <script src="https://cdn.tailwindcss.com"></script>
  -->
  <!-- TAILWIND CSS END -->

  <!-- BOOTSTRAP START -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- BOOTSTRAP END -->

  <!-- FLICKITY START -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js"></script>
  <!-- FLICKITY END -->

  <!-- SCRIPT START -->
  <script src="./dist/js/scripts.js"></script>
  <!-- SCRIPT END -->

  <!-- STYLE.CSS START -->
  <link rel="stylesheet" type="text/css" href="./dist/css/style.min.css" />
  <!-- STYLE.CSS END -->
</head>

<body>
  
  <div class="main-content container-fluid">
    <nav id="mainbar"> 
      <?php include("layouts/mainbar.php"); ?>
    </nav>
    <div id="page-content" style="margin-top: 65px;">
      <?php include("layouts/leftbar.php"); ?>
      <div class="col-12">
        <?php include("modals/post.php"); ?>
        <?= $content ?>
      </div>
    </div>
  </div>
</body>

</html>