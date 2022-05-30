<!DOCTYPE html>
<html lang="fr">

<head>
    <title>bebl.io</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/light/brand_icon.svg" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $pageDescription ?>">

    <!-- BOOTSTRAP START -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP END -->
    <!-- FLICKITY START -->
    <link href=".\node_modules\flickity\dist\flickity.min.css" rel="stylesheet" />
    <script src=".\node_modules\flickity\dist\flickity.pkgd.min.js"></script>
    <!-- FLICKITY END -->

    <!-- SCRIPT START -->
    <script src="./dist/js/scripts.js"></script>
    <!-- SCRIPT END -->
</head>

<body class="dark-mode">
    <nav>
        <span class="navbar-brand">
            <img src="./assets/img/light/brand_icon.svg" height="65px">
            <img src="./assets/img/light/brand_text.svg" height="65px">
        </span>
    </nav>
    <div id="join-us">
        <div class="row">
            <div class="container d-flex">
                <div class="main-image col-6">
                    <img src="./assets/img/hot_tea.png" height="300px">
                </div>
                <div class="main-text col-6">
                    <h1>Connectez-vous.</h1>
                    <a class="btn btn-primary" href="./?r=connect">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
    <div id="help-us">
        <div class="row">
            <div class="container d-flex">
                <div class="main-text col-6">
                    <h1>NOUS SOUTENIR.</h1>
                    <p>Il n'a jamais été aussi facile de partager son <strong>savoir</strong> et sa
                        <strong>créativité</strong>. À vos côtés, notre objectif est de mettre en avant et de faciliter
                        les <strong>échanges</strong> et l'<strong>entraide</strong> entre créateurs de contenus.
                    </p>
                </div>
                <div class="main-image col-6">
                    <img src="/assets/images/freehandly.png" height="300px">
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row">
            <div class="container d-flex">
                2022 FreeHandly - Droits réservés. Développé par Sycatle.
            </div>
        </div>
    </footer>
</body>

</html>