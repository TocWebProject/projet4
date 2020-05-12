<?php
class PostManager
{
    // Récupération de tous les articles
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS day_post, DATE_FORMAT(creation_date, \'%Hh%imin%ss\') AS hour_post  FROM articles ORDER BY id DESC');

        return $posts;
    }

    // Récupération des trois derniers articles
    public function lastThreeArticles()
    {
        $db = $this->dbConnect();
        $lastThreePosts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS day_post, DATE_FORMAT(creation_date, \'%Hh%imin%ss\') AS hour_post  FROM articles ORDER BY creation_date DESC LIMIT 0, 3');
       
        return $lastThreePosts;
    }

    // Récupération d'un seul Article
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS day_post  FROM articles WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    // Ajout d'un article
    public function addPost($newTitle, $newContent)
    {
        $db = $this->dbConnect();
        $ins = $db->prepare('INSERT INTO articles (id, title, content, creation_date) VALUES (null, ?, ?, NOW())');
        $ins->execute(array($newTitle, $newContent));

        return $ins;
    }

    // Modification d'un article
    public function addUpdatePost($updateTitle, $updateContent, $id)
    {
        $db = $this->dbConnect();
        $update = $db->prepare('UPDATE articles SET title=?, content=?, creation_date=NOW() WHERE id=?');
        $update->execute(array($updateTitle, $updateContent, $id));

        return $update;
    }

    //Suppression d'un article
    public function deleteArticle($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM articles WHERE id = ?');
        $req->execute(array($id));

        return $req;
    }

    // Connexion à la bdd.
    private function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=jeanForteroche-blog;charset=utf8', 'root', 'root');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}