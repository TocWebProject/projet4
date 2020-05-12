<?php

//Chargement des classes
require_once('src/Models/PostManager.php');
require_once('src/Models/CommentManager.php');
require_once('src/Models/AdminManager.php');

// ------------------------------- Dashboard -------------------------------

// Affichage du dashboard pour l'administrateur. 
function dashboard(){
    // Si l'administrateur à ouvert une Session, il a accès au dashboard. 
    if(isset($_SESSION['userid'])){
        //Nombre de commentaires signalés
        $commentManager = new CommentManager();
        $newCountSignaledComments = $commentManager->countSignaledComments();
        require ('src/Views/Back/viewHomeDashboard.php');
    }
    // Si un utilisateur tente d'accéder au backoffice sans être connecté -> retour accueil. 
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }
}

// ------------------------------- Articles -------------------------------

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

function addNewPost($titleNewPost, $contentNewPost){
    // Si l'administrateur à ouvert une Session, il peut ajouter un nouvel article. 
    if(isset($_SESSION['userid'])){

        $postManager = new PostManager();
        $newPost = $postManager->addPost($titleNewPost, $contentNewPost);
        
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

function errorAddNewPost($errors){
    if(isset($_SESSION['userid'])){
        require ('src/Views/Back/viewAddArticleDashboard.php');
    }
}


// Affichage de la liste des articles et options de modification pour l'administrateur.
function modifyArticle(){
    // Si l'administrateur à ouvert une Session, il a accès à la page. 
    if(isset($_SESSION['userid'])){
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require ('src/Views/Back/viewModifyArticleDashboard.php');
        }
        // Si un utilisateur tente d'accéder au backoffice sans être connecté -> retour accueil.
        else {
            header('location: ./index.php?action=accueil');
            exit;
        }
}

// Affichage d'un article à modifier. 
function addModificationArticle($id){
    // Si l'administrateur à ouvert une Session, il a accès à la page.
    if(isset($_SESSION['userid'])){

        if (isset($id) && $id > 0) {
            $postManager = new PostManager();
            $post = $postManager->getPost($id);
            require ('src/Views/Back/viewAddModificationArticle.php');
        }
    }
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }   
}

// Modification d'un article. 
function addNewUpdatePost($titleModificationPost, $contentAddModificationArticle, $id){
    // Si l'administrateur à ouvert une Session, il peut modifier son article. 
    if(isset($_SESSION['userid'])){
        $postManager = new PostManager();
        $updatePost = $postManager->addUpdatePost($titleModificationPost, $contentAddModificationArticle, $id);
        
        // Si l'article a été modifié -> redirection vers la liste des articles dans le dashboard. 
        if($updatePost){
            header('location: ./index.php?action=modifyArticle');
            exit;
         }
         else{
            echo 'Erreur';
        }    
    } 
    // Si un utilisateur tente de modifier un article sans être connecté -> retour accueil.
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }   
}

function errorAddNewUpdatePost($errors, $id){
    // Si l'administrateur à ouvert une Session, il peut modifier son article. 
    if(isset($_SESSION['userid'])){
        $postManager = new PostManager();
        $post = $postManager->getPost($id);
        require ('src/Views/Back/viewAddModificationArticle.php');
    }
}

// Suppression d'un article.
function deleteThisArticle($id){
    // Si l'administrateur à ouvert une Session, il peut supprimer son article. 
    if(isset($_SESSION['userid'])){
        $postManager = new PostManager();
        $newDeleteArticle = $postManager->deleteArticle($id);

        if($newDeleteArticle){
            header('location: ./index.php?action=modifyArticle');
            exit;
        }

    } 
    // Si un utilisateur tente de supprimer un article sans être connecté -> retour accueil.
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }    
}

// ------------------------------- Commentaires -------------------------------

function moderateComments(){
    // Si l'administrateur à ouvert une Session, il a accès à la page. 
    if(isset($_SESSION['userid'])){
        $commentManager = new CommentManager();
        $comments = $commentManager->getAllComments();
        $signaledComments = $commentManager->getAllSignaledComments();
        $newCountSignaledComments = $commentManager->countSignaledComments(); 

        require ('src/Views/Back/viewCommentsModeration.php');
        }
        // Si un utilisateur tente d'accéder au backoffice sans être connecté -> retour accueil.
        else {
            header('location: ./index.php?action=accueil');
            exit;
        }
}

function validateThisComment($isSignaled, $commentId){
    // Si l'administrateur à ouvert une Session, il peut valider un commentaire. 
    if(isset($_SESSION['userid'])){
        $commentManager = new CommentManager();
        $newValidateComment = $commentManager->validateComment($isSignaled, $commentId);
    
        if($newValidateComment){
        header('location: ./index.php?action=moderateComments');
        exit;
        }
    }
    // Si un utilisateur tente de valider un commentaire sans être connecté -> retour accueil.
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }        
}



// Suppression d'un Commentaire
function deleteThisComment($id){
    // Si l'administrateur à ouvert une Session, il peut supprimer un commentaire. 
    if(isset($_SESSION['userid'])){
        $commentManager = new CommentManager();
        $newDeleteComment = $commentManager->deleteComment($id);

        if($newDeleteComment){
            header('location: ./index.php?action=moderateComments');
            exit;
        }

    } 
    // Si un utilisateur tente de supprimer un commentaire sans être connecté -> retour accueil.
    else {
        header('location: ./index.php?action=accueil');
        exit;
    }    
}
