<?php

// Activer l'affichage des erreurs pour le diagnostic
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
error_reporting(E_ALL);


require_once __DIR__ .'/../headers/v_header_connexion_inscription.php';
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3" id="connexion">
                <h1 class="text-center mt-5 p-2">Connexion</h1>
                <form action="?action=connexion" method="post">
                    <div class="mb-3" id="email">
                        <label for="email" class="form-label">Adresse email <span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3" id="password">
                        <label for="password" class="form-label">Mot de passe <span class="required">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom btn-block">Se connecter</button>
                    </div>
                </form>

                <div class="d-flex justify-content-center mt-3" id="lienInscription">
                    <a href="?action=inscription">Pas encore inscrit ?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>