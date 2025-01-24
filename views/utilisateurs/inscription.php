<?php


// Activer l'affichage des erreurs pour le diagnostic
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
error_reporting(E_ALL);

require_once __DIR__ .'/../headers/v_header_connexion_inscription.php';

?>
<body></body>
    <div class="container" id="inscription">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3" id="inscription">
                <h1 class="text-center mt-5 p-2">Inscription</h1>
                <form action="?action=inscription" method="post">
                    <div class="mb-3" id="nom">
                        <label for="nom" class="form-label">Pseudo <span class="required">*</span></label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" required autocomplete="">
                    </div>
                    <div class="mb-3" id="email">
                        <label for="email" class="form-label">Adresse email <span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="">
                    </div>
                    <div class="mb-3" id="password">
                        <label for="password" class="form-label">Créer votre mot de passe <span class="required">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3" id="password_confirm">
                        <label for="password_confirm" class="form-label">Confirmer votre mot de passe <span class="required">*</span></label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-custom btn-block">S'inscrire</button>
                    </div>
                </form>
                <div class="d-flex justify-content-center mt-3" id="lienConnexion">
                    <a href="?action=connexion">Déjà inscrit ?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
