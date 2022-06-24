<?php
/* 

-- Rôle: Modal de création des articles
-- Auteur: Charlie
-- Date de création: 07/06/2022
-- Dernière modification: 24/06/2022

*/

?>

<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Supprimer votre compte définitivement ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="py-1 mx-auto" method="POST" name="settings_deleteuser" action="./?r=settings">
                    <p>Êtes-vous sûr et certain de vouloir supprimer votre compte? <strong>Cette action est irréversible.</strong></p>
                    <div class="modal-footer text-center mt-1">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close" type="button">Annuler</button>
                        <button name="settings_deleteuser" class="btn btn-danger" type="submit">Oui, je suis sûr</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>