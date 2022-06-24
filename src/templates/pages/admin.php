<?php
$pageTitle = "Administration";
$pageDescription = "Page d'administration de bebl.io";
$canGoBack = true;

ob_start();
?>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<section id="admin-section" class="container">
    <div class="row d-flex my-3">
        <div class="card rounded-3 col-3 mx-auto">
            <h3 class="text-center mb-4 my-auto">Nombre d'utilisateurs</h3>
        </div>
        <div class="card rounded-3 col-3 mx-auto">
            <h3 class="text-center mb-4 my-auto">Nombre de post</h3>
        </div>
        <div class="card rounded-3 col-3 mx-auto ">
            <h3 class="text-center mb-4 my-auto">Nombre de ...</h3>
        </div>
    </div>
    <div class="card row rounded-3 my-3">
        <h3 class="text-center mb-4 mt-4">Gestion du contenu</h3>
        <div class="d-flex">
            <div class="nav flex-column nav-pills me-3 col-3 justify-content-center mx-auto" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Utilisateurs</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
            </div>
            <div class="tab-content col-9" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <table class="table table-dark mx-auto">
                        <tr>
                            <th>#</th>
                            <th>@</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Birthdate</th>
                            <th>Joindate</th>
                        </tr>
                        <?php while ($row = $users->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <th><?= $row['user_id'] ?></th>
                                <th><?= $row['user_username'] ?></th>
                                <th><?= $row['user_firstname'] ?></th>
                                <th><?= $row['user_lastname'] ?></th>
                                <th><?= $row['user_birthdate'] ?></th>
                                <th><?= $row['user_joindate'] ?></th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>