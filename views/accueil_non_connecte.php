<?php
require_once __DIR__ . '/headers/v_header.php'; 
?>

<section class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="text-center">
                    <h1 class="header-title mb-4">
                        Bienvenue sur<br>
                        <span class="logo-blue">Blue</span><span class="logo-reading">Reading</span>
                    </h1>
                    <p class="header-subtitle mb-5">Suivez vos lectures facilement avec BlueReading. <br>Inscrivez-vous dès maintenant pour profiter de toutes les fonctionnalités de BlueReading.</p>


                    <div class="header-button">
                        <a href="?action=inscription" class="btn btn-custom">
                            <i class="fas fa-user-plus me-2"></i>
                            Inscription
                        </a>
                        <a href="?action=connexion" class="btn btn-custom_secondary">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Connexion
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/v_footer.php'; // Chemin corrigé pour inclure v_footer.php
?>
