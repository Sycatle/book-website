<?php 
$error = $_GET['error'];

ob_start(); 
?>


<section id="post-section">
    <h1 class="my-5 py-5 text-center">ERREUR <?php echo($error);?><br>Désolé, nous ne pouvons pas trouver de données pour cette page.</h1>
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>