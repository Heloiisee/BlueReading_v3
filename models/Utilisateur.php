<?php 
// Model pour les utilisateurs
Class Utilisateur{

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function creerUtilisateur($pseudo, $email, $hashed_password) {
        $query = "INSERT INTO utilisateurs (pseudo, email, mot_de_passe) VALUES (?, ?, ?)"; // Requête SQL
        $stmt = $this->conn->prepare($query); // Préparation de la requête
        $stmt->bind_param('sss', $pseudo, $email, $hashed_password); // Liaison des paramètres
        // Exécuter la requête
        if ($stmt->execute()) {
            return $stmt->insert_id; // Retourner l'ID de l'utilisateur créé
        } else {
            return false; // Échec de l'insertion
        }
    }


    public function ajouterUtilisateur($data){
        try{
            $sql = "INSERT INTO utilisateurs (pseudo, email, mot_de_passe) 
            VALUES (:nom, :prenom, :email, :mot_de_passe)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':pseudo', $data['pseudo']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':mot_de_passe', $data['mot_de_passe']);
            $stmt->execute($data);
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function modifierUtilisateur($id, $data){
        try{
            $sql = "UPDATE utilisateurs SET pseudo = :pseudo, email = :email, mot_de_passe = :mot_de_passe WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':pseudo', $data['pseudo']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':mot_de_passe', $data['mot_de_passe']);
            $stmt->bindParam(':id', $id);
            $stmt->execute($data);
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function supprimerUtilisateur($id){
        try{
            $sql = "DELETE FROM utilisateurs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function verifierUtilisateur($data){
        try{
            $sql = "SELECT * FROM utilisateurs WHERE email = :email AND mot_de_passe = :mot_de_passe";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':mot_de_passe', $data['mot_de_passe']);
            $stmt->execute();
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
            return $utilisateur;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getUtilisateur($id){
        try{
            $sql = "SELECT * FROM utilisateurs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getAllUtilisateurs(){
        try{
            $sql = "SELECT * FROM utilisateurs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getUtilisateurByEmail($email){
        try{
            $sql = "SELECT * FROM utilisateurs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


}