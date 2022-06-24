<?php
/* 

-- Rôle: Modal de création des articles
-- Auteur: Charlie
-- Date de création: 07/06/2022
-- Dernière modification: 08/06/2022

*/

?>

<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">Changer votre adresse-mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="py-1 mx-auto" method="POST" name="change_email" action="./?r=settings">
                    <div class="form-floating my-2">
                        <input name="email" type="text" class="form-control" placeholder="Entrer votre adresse-mail" required>
                        <label for="email">Adresse-mail actuelle</label>
                    </div>
                    <div class="form-floating my-4">
                        <input name="password" type="text" class="form-control" placeholder="Entrer votre mot de passe actuel" required>
                        <label for="password">Mot de passe</label>
                    </div>
                    <hr>
                    <div class="form-floating my-4">
                        <input name="email" type="text" class="form-control" placeholder="Entrer votre nouvelle adresse-mail" required>
                        <label for="email">Nouvelle adresse-mail</label>
                    </div>
                    <div class="modal-footer text-center mt-1">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close" type="button">Annuler</button>
                        <button name="change_email" class="btn btn-primary" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>