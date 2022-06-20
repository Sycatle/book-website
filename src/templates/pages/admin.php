<?php 
$pageTitle = "Administration";
$canGoBack = false;

ob_start();
?>
<section id="admin-section" class="container">
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php while($row = $users->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th><?= $row['user_id'] ?></th>
                <th><?= $row['user_username'] ?></th>
                <th><?= $row['user_firstname'] ?></th>
                <th><?= $row['user_lastname'] ?></th>
            </tr>
        <?php } ?>
    </table>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>