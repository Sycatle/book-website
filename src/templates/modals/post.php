<?php
/* 

-- Rôle: Modal de création des posts
-- Auteur: Charlie
-- Date de création: 07/06/2022
-- Dernière modification: 08/06/2022

*/

?>

<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Ajouter un post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" name="post_post">
                    <div class="mb-2">
                        <label for="post-title" class="col-form-label">Titre:</label>
                        <input type="text" class="form-control" id="post-title" name="post_title" required>
                    </div>
                    <div class="mb-2">
                        <label for="post-content" class="col-form-label">Contenu:</label>
                        <textarea class="form-control" name="post_description" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="post-cover" class="form-label">Couverture:</label>
                        <input class="form-control" type="file" name="post_img" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="post_post">Publier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>