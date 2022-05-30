<?php 
$pageTitle = "Administration";

ob_start();
?>
<section id="admin-section" class="py-5">
    <table class="py-5">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php while($row = $this->getUserList()->fetch(PDO::FETCH_ASSOC)) { ?>
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