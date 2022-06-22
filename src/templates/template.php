<?php
// Initialisation des variables:
$pageTitle;
$pageDescription;
$pageTypeName;
$pageKeywords;

$pageCss = array(
  "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
  "https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css",
  "./dist/css/style.min.css"
);
$pageJavascripts = array(
  "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js",
  "https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js",
  "./dist/js/scripts.js"
);

?>

<!DOCTYPE html>
<html>

<head>
  <title><?= (isset($pageTitle) ? $pageTitle . " | " : "") . "bebl.io" ?></title>
  <link rel="icon" type="image/x-icon" href="./assets/img/light/brand_icon.svg" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= $pageDescription ?>">
  <meta name="author" content="sycatle.dev">
	<meta name="keywords" content="bebl.io, biblio, livres, auteurs">

  <?php
  foreach ($pageCss as $css) { ?>
    <link rel="stylesheet" href="<?= $css ?>">
  <?php } 
  foreach ($pageJavascripts as $js) { ?>
    <script src="<?= $js ?>"></script>
  <?php } ?>

</head>

<body>
  <?php include($user != null ? "modals/post.php" : "modals/login.php"); ?>
  <div class="main-content container-fluid">
    <?php include("layouts/mainbar.php"); ?>
    <div style="margin-top: 65px;">
      <?php include("layouts/leftbar.php"); ?>

        <!-- Affichage du contenu de la page -->
        <?= $content ?>
        <!-- Fin de l'affichage du contenu de la page -->
        
    </div>
    <?php include("layouts/footer.php"); ?>
  </div>
</body>

</html>