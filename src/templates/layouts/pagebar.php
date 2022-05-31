<div class="nav-area col-4">
    <?php if ($canGoBack) { ?>
        <a href="."><img src="./assets/img/left-arrow.svg" height="20px"></a>
    <?php } ?>
    <span id="page-title"> <?php echo (isset($pageTypeName) ? $pageTypeName : $pageTitle); ?> </span>
</div>

<div class="search-area col-4 mx-auto">
    <form method="GET" action="" class="input-group mx-auto">
        <input type="text" class="form-control" placeholder="Recherche par mot-clés.." required>
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><img src="./assets/img/dark/search.png" height="20px"></button>
    </form>
</div>