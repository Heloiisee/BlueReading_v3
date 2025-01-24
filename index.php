<?php
session_start();

// Activer l'affichage des erreurs pour le diagnostic
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
error_reporting(E_ALL);

// Inclusion des fichiers essentiels
require_once 'config/database.php';
require_once 'controllers/LivresController.php';
require_once 'controllers/MainController.php';
require_once 'controllers/UtilisateursController.php';

// Debug: Vérifier l'état de la session
if (isset($_SESSION['user_id'])) {
    // echo "Session active pour l'utilisateur ID : " . $_SESSION['user_id'];
} else {
    // echo "Aucune session active pour l'utilisateur.";
}

// Header spécifique pour les pages de connexion et d'inscription
if (isset($_GET['action']) && ($_GET['action'] === 'connexion' || $_GET['action'] === 'inscription')) {
    // echo "Chargement du header de connexion/inscription";
    include 'views/headers/v_header_connexion_inscription.php';
} else {
    // echo "Chargement du header par défaut";
    include 'views/headers/v_header.php';
}

// Sélection du contrôleur approprié
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'accueil':
            $controller = new MainController();
            $controller->accueil();
            break;
        case 'ajouter':
            $controller = new LivresController();
            $controller->ajouterLivre();
            break;
        case 'sauvegarder':
            $controller = new LivresController();
            $controller->sauvegarderLivre();
            break;
        case 'bibliotheque':
            $controller = new LivresController();
            $controller->afficherLivres();
            break;
        case 'apropos':
            $controller = new MainController();
            $controller->apropos();
            break;
        case 'connexion':
            require_once 'views/utilisateurs/connexion.php';
            break;
        case 'connexionUtilisateur':
            $controller = new UtilisateursController();
            $controller->connexionUtilisateur();
            break;
        case 'inscription':
            require_once 'views/utilisateurs/inscription.php';
            break;
        case 'inscriptionUtilisateur':
            $controller = new UtilisateursController();
            $controller->inscriptionUtilisateur();
            break;
        case 'deconnexion':
            session_destroy();
            $controller = new MainController();
            $controller->accueil();
            break;
        default:
            $controller = new MainController();
            $controller->accueil();
            break;
    }
} else {
    // Afficher l'accueil par défaut pour les utilisateurs non connectés
    $controller = new MainController();
    $controller->accueil();
}

require_once 'views/v_footer.php';
?>
