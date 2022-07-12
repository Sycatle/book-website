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
  "https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js",
  "./dist/js/app.js"
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title><?= (isset($pageTitle) ? $pageTitle . " | " : "") . "bebl.io" ?></title>
  <link rel="icon" type="image/x-icon" href="./assets/img/light/brand_icon.svg" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= $pageDescription ?>">
  <meta name="author" content="sycatle.dev">
	<meta name="keywords" content="bebl, io, beblio, biblio, livres, auteurs, citations, note, culture">
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Bebl.io">
  <meta name="twitter:description" content="<?= $pageDescription ?>">
  <meta name="twitter:site" content="@bebl_dot_io">
  <meta name="twitter:creator" content="@sycatle">
  <meta name="twitter:image" content="https://www.bebl.io/assets/img/light/brand.svg">

  <!-- Open Graph general (Facebook, Pinterest)-->
  <meta property="og:title" content="Bebl.io">
  <meta property="og:description" content="<?= $pageDescription ?>">
  <meta property="og:url" content="https://www.bebl.io">
  <meta property="og:site_name" content="Beblio">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://www.bebl.io/assets/img/light/brand.svg">

  <?php
  foreach ($pageCss as $css) { ?>
    <link  type="text/css" rel="stylesheet" href="<?= $css ?>">
  <?php } 
  foreach ($pageJavascripts as $js) { ?>
    <script type="text/javascript" src="<?= $js ?>"></script>
  <?php } ?>

</head>

<body class="dark-mode">
    <?php if (!isset($noHeader)) { include("layouts/mainbar.php"); } ?>
    <div id="main-content" style="margin-top: 65px;">
      <?php if (!isset($noSidebar)) { include("layouts/leftbar.php"); } ?>
        <!-- Affichage du contenu de la page -->
        <?= $content ?>
        <!-- Fin de l'affichage du contenu de la page -->
    </div>
    <?php if (!isset($noFooter)) { include("layouts/footer.php"); } ?>
</body>

</html>