<?php
// Controller pour les utilisateurs

// Activer l'affichage des erreurs pour le diagnostic
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
error_reporting(E_ALL);


/**
 * Class UtilisateursController
 * Cette classe permet de gérer les utilisateurs
 * 
 * PHP version 7.4
 * @author heloise 
 */

// Inclusion des fichiers
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Utilisateur.php';


Class UtilisateursController{

    private $utilisateur; // Variable pour stocker un objet Utilisateur

    // Constructeur
    public function __construct(){
        $database = new Database();
        $this->utilisateur = new Utilisateur($database->getConnection());
        
    }

    // Méthode pour gérer la connexion de l'utilisateur
    public function connexionUtilisateur() {
        // Récupération des données du formulaire
        $email = htmlspecialchars($_POST['email']);
        $mot_de_passe = $_POST['mot_de_passe'];
        $utilisateur = $this->utilisateur->getUtilisateurByEmail($email);
        // Vérification du mot de passe
        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            $_SESSION['utilisateur_id'] = $utilisateur['id'];
            // $_SESSION['role'] = $utilisateur['role'];
            header('Location: ?action=bibliotheque');
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    }

    // Méthode pour gérer la déconnexion de l'utilisateur
    public function deconnexionUtilisateur() {
        session_destroy();
        header('Location: ?action=connexion');
    }

     // Méthode pour gérer l'inscription de l'utilisateur
    public function inscriptionUtilisateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if ($password === $password_confirm) {
                // Hasher le mot de passe
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Créer l'utilisateur
                $user_id = $this->utilisateur->creerUtilisateur($pseudo, $email, $hashed_password);

                if ($user_id) {
                    // Connexion automatique
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $pseudo;
                    header('Location: ?action=accueil');
                    exit();
                } else {
                    // Gérer l'échec de l'inscription (par exemple, email déjà utilisé)
                    $_SESSION['error'] = "Une erreur est survenue lors de la création du compte.";
                    header('Location: ?action=inscription');
                    exit();
                }
            } else {
                // Les mots de passe ne correspondent pas
                $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
                header('Location: ?action=inscription');
                exit();
            }
        }
    }
    

    // Méthode pour afficher le formulaire d'ajout d'utilisateur
    public function ajouterUtilisateur() {
        require_once 'views/utilisateurs/ajouter.php';
    }

    // Méthode pour afficher la liste des utilisateurs
    public function afficherUtilisateurs() {
        // Récupération de la liste des utilisateurs
        $utilisateurs = $this->utilisateur->getAllUtilisateurs();
        require_once 'views/utilisateurs/liste.php';
    }

    // Méthode pour afficher les détails d'un utilisateur
    public function detailUtilisateur($id) {
        // Récupération des informations de l'utilisateur
        $utilisateur = $this->utilisateur->getUtilisateur($id);
        require_once 'views/utilisateurs/detail.php';
    }

    // Méthode pour afficher le formulaire de modification d'un utilisateur
    public function modifierUtilisateur($id) {
        // Modifier des informations de l'utilisateur
        $utilisateur = $this->utilisateur->getUtilisateur($id);
        require_once 'views/utilisateurs/modifier.php';
    }

    // Méthode pour gérer la mise à jour d'un utilisateur
    public function updateUtilisateur($id) {
        // Récupération des données du formulaire
        $data = [
            'pseudo' => htmlspecialchars($_POST['pseudo']),
            'email' => htmlspecialchars($_POST['email']),
            'mot_de_passe' => password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT),
            // 'role' => htmlspecialchars($_POST['role'])
        ];
        // Appel de la méthode pour modifier un utilisateur
        if ($this->utilisateur->modifierUtilisateur($id, $data)) {
            header('Location: ?action=listeUtilisateurs');
        } else {
            echo "Erreur lors de la mise à jour de l'utilisateur.";
        }
    }

     // Méthode pour gérer la suppression d'un utilisateur
    public function supprimerUtilisateur($id) {
        // Appel de la méthode pour supprimer un utilisateur
        if ($this->utilisateur->supprimerUtilisateur($id)) {
            header('Location: ?action=listeUtilisateurs');
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    }


}
