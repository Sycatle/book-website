<?php
/* 

-- Rôle: Modal de création des articles
-- Auteur: Charlie
-- Date de création: 07/06/2022
-- Dernière modification: 08/06/2022

*/

?>

<div class="modal fade" id="usernameModal" tabindex="-1" aria-labelledby="usernameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="usernameModalLabel">Changer votre nom d'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="py-1 mx-auto" method="POST" name="change_username" action="./?r=settings">
                    <div class="form-floating my-2">
                        <input name="identifier" type="text" class="form-control" placeholder="Entrer votre identifiant" value="<?= $user->getUsername() ?>" required>
                        <label for="identifier">Nouveau nom d'utilisateur</label>
                    </div>
                    <div class="form-floating my-4">
                        <input name="identifier" type="text" class="form-control" placeholder="Entrer votre mot de passe actuel" required>
                        <label for="identifier">Mot de passe</label>
                    </div>

                    <div class="modal-footer text-center mt-1">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close" type="button">Annuler</button>
                        <button name="change_username" class="btn btn-primary" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>