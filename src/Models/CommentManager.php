<?php
require_once('Manager.php');
class CommentManager extends Manager 
{
    // Récupération des commentaires d'un article.
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS day_post, isSignaled FROM comments WHERE articleid = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    // Ajout d'un commentaire
    public function addComment($postId, $author, $insertComment)
    {    
        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO comments (articleid, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
        $ins->execute(array($postId, $author, $insertComment));
        // Reload de la page une fois le commentaire insérer dans la bdd. 
        if($ins){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    // Modération d'un commentaire
    public function signalComment($isSignaled, $id)
    {
        $db = $this->dbConnect();
        $signal = $db->prepare('UPDATE comments SET isSignaled=? WHERE id=?');
        $signal->execute(array($isSignaled, $id));
        
        return $signal;
    }

    // Récupération de tous les commentaires du blog
    public function getAllComments() 
    {
        $db = $this->dbConnect();
        $allComments = $db->query('SELECT id, articleid, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS day_post, isSignaled FROM comments ORDER BY comment_date DESC');

        return $allComments;

    } 

    // Récupération de tous les commentaires signalés du blog
    public function getAllSignaledComments() 
    {
        $db = $this->dbConnect();
        $allSignaledComments = $db->query('SELECT id, articleid, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS day_post, isSignaled FROM comments WHERE isSignaled = true ORDER BY comment_date DESC');

        return $allSignaledComments;

    } 

    //Compteur de commentaires signalés sur le blog
    public function countSignaledComments(){
        $db = $this->dbConnect();
        $countSignaledComments = $db->query('SELECT COUNT(isSignaled) FROM comments')->fetchColumn();
        
        return $countSignaledComments;
        
    }

    // Validation d'un commentaire signalé
    public function validateComment($isSignaled, $id)
    {
        $db = $this->dbConnect();
        $validate = $db->prepare('UPDATE comments SET isSignaled=? WHERE id=?');
        $validate->execute(array($isSignaled, $id));
        
        return $validate;
    }

    //Suppression d'un Commentaire
    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($id));

        return $req;

    }

}