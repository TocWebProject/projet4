<?php
require_once('Manager.php');
class AdminManager extends Manager 
{
    // Check Login
    public function checkLogin($mail, $pwd)
    {
        // Récupération des informations de l'admin dans la base de donnée
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT * FROM adminLogin WHERE emailAdmin = ?');
        $query->execute(array($mail));
        $row=$query->fetch(PDO::FETCH_ASSOC);

        // Si il n'y pas de résultat -> le mail admin n'existe pas.
        if (!$row) {
            return false;
        // Si il y a un résultat -> Vérification de la corespondance entre les informations entre la saisie de l'utilisateur et les informations de la base de donnée.
        } else {
            $isPasswordCorrect = password_verify($pwd, $row["pwdAdmin"]);
            // Si le mdp est correct. 
            if ($isPasswordCorrect) {
        
            $_SESSION['userid'] = $row['emailAdmin'];
            return true;

            } else {
            // Si le mdp est incorrect.    
                return false;
            }
        }
    }  
  
}