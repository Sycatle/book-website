<?php
/* 

-- Rôle: Modal de création des articles
-- Auteur: Charlie
-- Date de création: 07/06/2022
-- Dernière modification: 24/06/2022

*/

?>

<div class="modal fade" id="disconnectModal" tabindex="-1" aria-labelledby="disconnectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="disconnectModalLabel">Vous souhaitez vous déconnecter ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="py-1 mx-auto" method="POST" name="settings_disconnect" action="./?r=disconnect">
                <div class="modal-body text-center mt-1">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close" type="button">Annuler</button>
                    <button name="settings_disconnect" class="btn btn-warning" type="submit">Oui, me déconnecter</button>
                </div>
            </form>
        </div>
    </div>
</div>