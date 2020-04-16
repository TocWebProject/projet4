<?php

// Récupération de tous les articles
function getPosts() 
{
    $db = dbConnect();
    $posts = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS day_post, DATE_FORMAT(creation_date, \'%Hh%imin%ss\') AS hour_post  FROM articles ORDER BY id DESC');

    return $posts;

} 

// Récupération des trois derniers articles
function lastThreeArticles()
{
    $db = dbConnect();
    $lastThreePosts = $db -> query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS day_post, DATE_FORMAT(creation_date, \'%Hh%imin%ss\') AS hour_post  FROM articles ORDER BY creation_date DESC LIMIT 0, 3');

    return $lastThreePosts;
}

// Récupération d'un seul Article
function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS day_post  FROM articles WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

// Extraire le début d'une chaîne de charactère  
function extractContent($string, $max_length)
{
    if (strlen($string) > $max_length)
        {
        $string = substr($string, 0, $max_length);
        $last_space = strrpos($string, " ");
        $string = substr($string, 0, $last_space)."...";
        return $string;
        }

}

// Ajout d'un commentaire
function addComment($postId, $author, $insertComment){
    
    $db = dbConnect();
    $ins = $db->prepare('INSERT INTO comments (articleid, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
    $ins->execute(array($postId, $author, $insertComment));
    // Reload de la page une fois le commentaire insérer dans la bdd. 
    if($ins){
        echo "<meta http-equiv='refresh' content='0'>";
    }

}

// Récupération des commentaires d'un article.
function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS day_post FROM comments WHERE articleid = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

// Récupération de tous les commentaires du blog
function getAllComments() 
{
    $db = dbConnect();
    $allComments = $db -> query('SELECT id, articleid, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS day_post FROM comments ORDER BY comment_date DESC');

    return $allComments;

} 

// Check Login
function checkLogin($mail, $pwd)
{
        // Récupération des informations de l'admin dans la base de donnée
        $db = dbConnect();
        $query = $db->prepare('SELECT * FROM adminLogin WHERE emailAdmin = ?');
        $query->execute(array($mail));
        $row=$query->fetch(PDO::FETCH_ASSOC);

        // Vérification de la corespondance entre les informations entre la saisie de l'utilisateur et les informations de la base de donnée.
        $isPasswordCorrect = password_verify($pwd, $row["pwdAdmin"]);
        var_dump($mail);
        var_dump($isPasswordCorrect);
        var_dump($row['pwdAdmin']);
        var_dump($pwd);

        
        if (!$row) {
            echo 'Mauvais identifiant ';
        } else {
            if ($isPasswordCorrect) {
     
                echo 'Vous êtes connecté !';
                session_start();
                $_SESSION['userid'] = $row['emailAdmin'];
                header('location: ./index.php?action=dashboard');

            } else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }

 }  
        




// Connection à la base de données 
function dbConnect()
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