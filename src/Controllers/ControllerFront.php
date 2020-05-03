<?php

//Chargement des classes
require_once('src/Models/PostManager.php');
require_once('src/Models/CommentManager.php');
require_once('src/Models/AdminManager.php');

// Affichage de la liste des articles du blog. 
function blog()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require ('src/Views/Front/viewArticles.php');
}

// Affichage de la page accueil. 
function accueil()
{
    // Récupération des 3 derniers articles grace à la fonction lastThreeArticles du Model.    
    $postManager = new PostManager(); 
    $lastThreePosts = $postManager->lastThreeArticles();

    require ('src/Views/Front/viewHome.php');
}

// Appel de la fonction extractContent dans le model pour récupérer un extrait de 'string'. 
function getExtractContent($string, $max_length)
{
    $newExtract = extractContent($string, $max_length);

    return $newExtract;
}

// Affichage de la page LogIn si l'administrateur n'est pas déja connecté. 
function login(){
    if(isset($_SESSION['userid'])){
        require ('src/Views/Back/viewHomeDashboard.php');
    }
    else {
        require ('src/Views/Front/viewLogIn.php');
    }
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

// Vérification des identifiants dans le model avec l'appel de la fonction checkLogin dans le Model.
function getCheckLogin($checkEmailAdmin, $checkPwdAdmin)
{
    $adminManager = new AdminManager();
    $commentManager = new CommentManager();
    $newLogIn = $adminManager->checkLogin($checkEmailAdmin, $checkPwdAdmin);

    // Si le Model renvoie false - Il y a une erreur
    if($newLogIn == false){
        $errors = 'Email ou mot de passe invalide';
        require ('src/Views/Front/viewLogIn.php');
    } 
    // Si $newLogin renvoie true. Les identifiants corespondent, l'utilisateur peut avoir accès au dashboard
    else {
        $newCountSignaledComments = $commentManager->countSignaledComments();
        require ('src/Views/Back/viewHomeDashboard.php');
    }
}

// Fonction permettant à l'adiministrateur de se déconnecter et retour à l'accueil. 
function logout()
{
    session_unset();
    session_destroy();
    accueil();
}

// Achichage d'un article précis et de ses commentaires associés grace à son ID.   
function singlePost($id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    if (isset($id) && $id > 0) {
        $post = $postManager->getPost($id);
        $comments = $commentManager->getComments($id);
        require ('src/Views/Front/viewSingleArticle.php');
    }
    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }  
}

// Insertion d'un commentaire dans un article précis. Appel de la fonction addComment() dans le Model. 
function addNewComment($id, $userName, $comment)
{
    $commentManager = new CommentManager();
    $newComment = $commentManager->addComment($id, $userName, $comment);
}
   
// Signalement d'un commentaire. 
function signalThisComment($isSignaled, $articleId, $commentId)
{
    $commentManager = new CommentManager();
    $newSignalement = $commentManager->signalComment($isSignaled, $commentId);

    if($newSignalement){
        header('location: ./index.php?action=article&id='.$articleId.'');
        exit;
    }

}

