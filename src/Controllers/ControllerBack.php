<?php

// Affichage du dashboard pour l'administrateur. 
function dashboard(){
    // Si l'administrateur à ouvert une Session, il a accès au dashboard. 
    if(isset($_SESSION['userid'])){
    require ('src/Views/Back/viewHomeDashboard.php');
    }
    // Si un utilisateur tente d'accéder au backoffice sans être connecté -> retour accueil. 
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }
}
// Affichage de la page ajout d'article pour l'administrateur.
function addArticle(){
    // Si l'administrateur à ouvert une Session, il a accès à la page.  
    if(isset($_SESSION['userid'])){
        require ('src/Views/Back/viewAddArticleDashboard.php');
        }
        // Si un utilisateur tente d'accéder au backoffice sans être connecté -> retour accueil. 
        else {
            header('location: ./index.php?action=accueil');
            exit;
        }
}

function modifyArticle(){
    // Si l'administrateur à ouvert une Session, il a accès à la page. 
    if(isset($_SESSION['userid'])){
        $posts = getPosts();
        require ('src/Views/Back/viewModifyArticleDashboard.php');
        }
        // Si un utilisateur tente d'accéder au backoffice sans être connecté -> retour accueil.
        else {
            header('location: ./index.php?action=accueil');
            exit;
        }
}

function moderateComments(){
    // Si l'administrateur à ouvert une Session, il a accès à la page. 
    if(isset($_SESSION['userid'])){
        $comments = getAllComments();
        require ('src/Views/Back/viewCommentsModeration.php');
        }
        // Si un utilisateur tente d'accéder au backoffice sans être connecté -> retour accueil.
        else {
            header('location: ./index.php?action=accueil');
            exit;
        }
}

function addNewPost($titleNewPost, $contentNewPost){
    // Si l'administrateur à ouvert une Session, il peut ajouter un nouvel article. 
    if(isset($_SESSION['userid'])){
    
        $newPost = addPost($titleNewPost, $contentNewPost);
        
        // Si l'article a été posté -> redirection vers la liste des articles dans le dashboard. 
        if($newPost){
            header('location: ./index.php?action=modifyArticle');
            exit;
         }        
    } 
    // Si un utilisateur tente d'ajouter un article sans être connecté -> retour accueil.
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }   
}
