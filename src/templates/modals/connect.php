<?php
/* 

-- Rôle: Modal de création des articles
-- Auteur: Charlie
-- Date de création: 07/06/2022
-- Dernière modification: 08/06/2022

*/

?>

<div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="articleModalLabel">Ajouter un article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" name="post_article">
                    <div class="mb-2">
                        <label for="article-title" class="col-form-label">Titre:</label>
                        <input type="text" class="form-control" id="article-title" name="article_title" required>
                    </div>
                    <div class="mb-2">
                        <label for="article-content" class="col-form-label">Contenu:</label>
                        <textarea class="form-control" name="article_description" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="article-cover" class="form-label">Couverture:</label>
                        <input class="form-control" type="file" name="article_img" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="post_article">Publier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>