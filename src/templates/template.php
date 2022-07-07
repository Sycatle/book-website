<?php
// Initialisation des variables:
$pageTitle;
$pageDescription;
$pageTypeName;
$pageKeywords;

$pageCss = array(
  "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",
  "./dist/css/flickity.min.css",
  "./dist/css/style.min.css"
);
$pageJavascripts = array(
  "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js",
  "https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js"/*,
  "./dist/js/scripts.min.js"*/
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

<body class="dark-mode">
    <?php if (!isset($noHeader)) { include("layouts/mainbar.php"); } ?>
    <div id="main-content" class="container-fluid" style="margin-top: 65px;">
      <?php if (!isset($noSidebar)) { include("layouts/leftbar.php"); } ?>
        <!-- Affichage du contenu de la page -->
        <?= $content ?>
        <!-- Fin de l'affichage du contenu de la page -->
    </div>
    <?php if (!isset($noFooter)) { include("layouts/footer.php"); } ?>
</body>

</html>