<?php
/* 

-- Rôle: Modal de création des articles
-- Auteur: Charlie
-- Date de création: 07/06/2022
-- Dernière modification: 08/06/2022

*/

?>

<script>
    /* Fonction qui permet de pouvoir afficher le mot de passe d'un formulaire */
    function showPassword() {
        $passwordArea = document.getElementById("password_area");
        $isHidden = $passwordArea.getAttribute("type") == "password";
        $passwordArea.setAttribute("type", $isHidden ? "text" : "password");
    }
</script>

<div class="modal fade" id="connectModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Accéder à votre compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="py-4 mx-auto" method="POST" name="login" action="./?r=connect">
                    <div class="form-floating my-2">
                        <input name="identifier" type="text" class="form-control" placeholder="Entrer votre identifiant" required>
                        <label for="identifier">Identifiant</label>
                    </div>

                    <div class="form-floating my-2">
                        <input name="password" type="password" placeholder="Entrer votre mot de passe" class="form-control" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="text-center pt-1 my-2">
                        <button name="login" class="btn btn-primary mb-3" type="submit">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>