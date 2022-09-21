<?php
$pageTitle = "Réglages";
$canGoBack = true;

ob_start();
?>
<section id="settings-section" class="container">
    <h3>Réglages</h3>
    <div class="card row rounded-3 my-3 h-100">
        <div class="d-flex">
            <nav class="nav flex-column nav-pills me-3 col-lg-3 justify-content-center mx-auto h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="true">Compte</button>
                <button class="nav-link" id="v-pills-security-tab" data-bs-toggle="pill" data-bs-target="#v-pills-security" type="button" role="tab" aria-controls="v-pills-security" aria-selected="false">Sécurité & Confidentialité</button>
                <button class="nav-link" id="v-pills-preferences-tab" data-bs-toggle="pill" data-bs-target="#v-pills-preferences" type="button" role="tab" aria-controls="v-pills-preferences" aria-selected="false">Préférences</button>
                <hr>
                <button class="nav-link" data-bs-toggle="modal" data-bs-target="#disconnectModal">Déconnexion</button>
            </nav>
            <div class="tab-content col-lg-9" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                    <?php
                    include("templates/modals/settings/username.php");
                    include("templates/modals/settings/email.php");
                    include("templates/modals/settings/delete_account.php");
                    include("templates/modals/settings/disconnect.php");
                    ?>
                    <h3>Mon Compte</h3>
                    <div class="card rounded-3 mx-auto container">
                        <h2>Modifier mon profil</h2>
                        <div class="my-2">
                            <img class="rounded-circle" src="<?= $user->getAvatarUrl() ?>" height="150" width="150" alt="Logo">
                            <button class="btn btn-secondary">Editer</button>
                        </div>
                        <hr>
                        <div class="my-2">
                            <label for="settings-username">Nom d'utilisateur</label>
                            <p id="settings-username"><?= $user->getUsername() ?></p>
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#usernameModal">Editer</button>
                        </div>
                        <div class="my-2">
                            <label for="settings-email">Email</label>
                            <?php $rplcByCross = substr($user->getEmail(), ($pos = strpos($user->getEmail(), '@')) !== false ? $pos + 1 : 0); ?>
                            <p id="settings-email">*******@<?= $rplcByCross ?></p>
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#emailModal">Editer</button>
                        </div>
                        <div class="my-2">
                            <label for="settings-firstname">Prénom</label>
                            <p id="settings-firstname"><?= $user->getFirstname() ?></p>
                            <button class="btn btn-secondary">Editer</button>
                        </div>
                        <div class="my-2">
                            <label for="settings-lastname">Nom de famille</label>
                            <p id="settings-lastname"><?= $user->getLastname() ?></p>
                            <button class="btn btn-secondary">Editer</button>
                        </div>
                        <div class="my-2">
                            <label for="settings-birth">Date de naissance</label>
                            <p id="settings-birth"><?= $user->getBirthDate() ?></p>
                            <button class="btn btn-secondary">Editer</button>
                        </div>
                        <hr>
                        <h2>Supprimer mon compte</h2>
                        <div class="my-5">
                            <!--<button class="btn btn-warning">Désactiver temporairement mon compte</button>-->
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Supprimer définitivement mon compte</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">2</div>
                <div class="tab-pane fade" id="v-pills-preferences" role="tabpanel" aria-labelledby="v-pills-preferences-tab">3</div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require("templates/template.php");
?>