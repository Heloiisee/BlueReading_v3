<?php


/**
 * Database configuration
 * 
 * PHP version 7.4
 * 
 * @category Config
 * @package  Config
 * @date     2021-01-22
 * @version  1.00
 * Last revision 2021-01-22
 * 
 */


require_once 'config/database.php'; //On inclut le fichier database.php pour pouvoir utiliser la classe Database
require_once 'models/Livre.php'; //On inclut le fichier Livre.php pour pouvoir utiliser la classe Livre

class LivresController{

    private $conn; //Variable qui va contenir la connexion à la base de données
    private $livre; //Variable qui va contenir l'instance de la classe Livre

    public function __construct() {
        $this->livre = new Livre((new Database())->getConnection());
    }

    public function ajouterLivre(){
        require_once 'views/livres/ajouter.php';
    }

    //Méthode pour sauvegarder un livre
    public function sauvegarderLivre(){
        // Réception des données du formulaire
        $data = [
            'titre' => htmlspecialchars($_POST['titre']),
            'auteur' => htmlspecialchars($_POST['auteur']),
            'pages' => htmlspecialchars($_POST['pages']),
            'genres' => htmlspecialchars($_POST['genres']),
            'date_publication' => htmlspecialchars($_POST['date_publication']),
            'description' => htmlspecialchars($_POST['description']),
            'statut' => htmlspecialchars($_POST['statut'])

        ];

        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $data['image'] =$this-> TelechargeImage($_FILES['image']);
        } else{
            $data['image'] = null;
        }

        if($this->livre->ajouterLivre($data)){
            $success = "Le livre a été ajouté avec succès !";
            header('Location: index.php?action=bibliotheque');
        } else {
            $error = "Une erreur est survenue lors de l'ajout du livre";
            require_once 'views/livres/ajouter.php';
        }
    }

    public function TelechargeImage($file){
        $uploadDir = 'public/uploads/covers/';
        if(!file_exists($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }
        $fileName = uniqid(). '_'. basename($file['name']);
        $filePath = $uploadDir . $fileName;

        if(move_uploaded_file($file['tmp_name'], $filePath)){
            return $filePath;
        } else {
            return null;
        }
        
    }

    public function afficherLivres(){
        $bdd = new Database();
        $livre = new Livre($bdd->getConnection());
        $livres = $livre->getAllLivres();
        require_once 'views/livres/bibliotheque.php';
    }

}