<?php 
$pageTitle = "Administration";
$canGoBack = false;

ob_start();
?>
<section id="admin-section">
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php $users = $manager->getUserManager()->getUsers(); while($row = $users->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <th><?php echo $row['user_id']; ?></th>
                <th><?php echo $row['user_username']; ?></th>
                <th><?php echo $row['user_firstname']; ?></th>
                <th><?php echo $row['user_lastname']; ?></th>
            </tr>
        <?php } ?>
    </table>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>