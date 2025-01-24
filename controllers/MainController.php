<?php
// Activer l'affichage des erreurs pour le diagnostic
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
error_reporting(E_ALL);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/MainManager.php';

class MainController {
    private $mainManager;

    public function __construct() {
        $database = new Database();
        $this->mainManager = new MainManager($database->getConnection());
    }

    public function accueil() {
        try {
            // Récupération des statistiques
            $stats = $this->mainManager->getStatistiques();

            // Vérification de l'état de connexion
            if (isset($_SESSION['user_id'])) {
                // Debug: Afficher un message si l'utilisateur est connecté
                // echo "Utilisateur connecté";
                // Utilisateur connecté
                require_once __DIR__ . '/../views/accueil_connecte.php';
            } else {
                // Debug: Afficher un message si l'utilisateur n'est pas connecté
                // echo "Utilisateur non connecté";
                // Utilisateur non connecté
                require_once __DIR__ . '/../views/accueil_non_connecte.php';
            }
        } catch(Exception $e) {
            $_SESSION['error'] = "Une erreur est survenue lors du chargement de la page d'accueil";
            $this->pageNonTrouvee();
        }
    }

    public function apropos() {
        $apropos = $this->mainManager->getAProposContent();
        require_once __DIR__ . '/../views/apropos.php';
    }

    // Méthode pour gérer les erreurs 404
    public function pageNonTrouvee() {
        require_once __DIR__ . '/../views/404.php';
    }

    public function pageStatique($page) {
        switch($page) {
            case 'conditions':
                require_once __DIR__ . '/../views/pages/politique-confidentialite.html';
                break;
            case 'mentions':
                require_once __DIR__ . '/../views/pages/mentions-legales.html';
                break;
            default:
                $this->pageNonTrouvee();
        }
    }
}
