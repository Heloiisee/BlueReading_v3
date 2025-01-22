<?php

/**
 * Model pour les livres
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

class Livre{

    private $conn; //Variable qui va contenir la connexion à la base de données

    public $id;

    public $titre;

    public $auteur;

    public $pages;

    public $genre;

    public $date_publication;

    public $description;

    public $image;

    public function __construct($db){
        $this->conn = $db;

    }
        // Fonction pour ajouter un livre
        public function ajouterLivre($data){
            try{
                $sql = "INSERT INTO livres (titre, auteur, pages, genre, date_publication, description, image) 
                VALUES (:titre, :auteur, :pages, :genre, :date_publication, :description, :image)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':titre', $data['titre']);
                $stmt->bindParam(':auteur', $data['auteur']);
                $stmt->bindParam(':pages', $data['pages']);
                $stmt->bindParam(':genre', $data['genre']);
                $stmt->bindParam(':date_publication', $data['date_publication']);
                $stmt->bindParam(':description', $data['description']);
                $stmt->bindParam(':image', $data['image']);
                $stmt->execute($data);
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
    
    }

    // Fonction pour modifier un livre
public function modifierLivres($id, $data){

    try{
        $sql = "UPDATE livres SET titre = :titre, auteur = :auteur, pages = :pages, genre = :genre, date_publication = :date_publication, description = :description, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titre', $data['titre']);
        $stmt->bindParam(':auteur', $data['auteur']);
        $stmt->bindParam(':pages', $data['pages']);
        $stmt->bindParam(':genre', $data['genre']);
        $stmt->bindParam(':date_publication', $data['date_publication']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':id', $id);
        $stmt->execute($data);
        return true;
    }
    catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }
}


    // Fonction pour supprimer un livre
    public function supprimerLivre(){
        try{
            $sql = "DELETE FROM livres WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


    // Fonction pour récupérer un livre
    public function getLivre($id){
        //On prépare la requête
        try{
            $sql = "SELECT * FROM livres WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        //On gère les erreurs
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    // Fonction pour récupérer tous les livres
    public function getAllLivres(){
        try{
            $sql = "SELECT * FROM livres";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

}
?>
