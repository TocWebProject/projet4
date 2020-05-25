<?php

session_start();

require('src/Controllers/ControllerFront.php');
require('src/Controllers/ControllerBack.php');

//Si il n'ya pas de $_GET['action'] ou si différent de $_GET['action'] -> Affichage de la page accueil 
if(!isset($_GET['action'])){
    return accueil();
}

switch ($_GET['action']) {
    /// ------------------------------- Router Front ------------------------------- ///
    // Affichage de la liste des articles. 
    case 'blog' :
        // Appel de la fonction blog() dans le controller Front.
        blog();
        break;
    // Affichage d'un article précis grace à son ID.    
    case 'article' :
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            singlePost($id);
        }else{
            error();
        }
        if(isset($_POST['submit_comment'])){
            // Si les champs existent et qu'ils ne sont pas vides.
            if(isset($_POST['userName'], $_POST['comment']) AND !empty($_POST['userName']) AND !empty($_POST['comment'])) {
                // Sécurisation des valeurs transmise par l'utilisateur:
                $userName  = htmlspecialchars(trim(stripslashes($_POST['userName'])));
                $comment = htmlspecialchars(trim(stripslashes($_POST['comment'])));
                $id = intval($_GET['id']);
                addNewComment($id, $userName, $comment);
            }
        }
        break;
    // Signalement d'un commentaire    
    case 'signalThisComment' :
        if(isset($_GET['id'], $_GET['articleId'])) {
            $articleId = intval($_GET['articleId']);
            $commentId = intval($_GET['id']);
            $isSignaled = true;
            // Appel de la fonction signalComment() dans le controller Front. 
            signalThisComment($isSignaled, $articleId, $commentId);
        }else{
            accueil();
        }
        break;
    //Affichage de la page Accueil
    case 'accueil' :
        accueil();
        break;
    // Affichage de la page 404 
    case '404' :
        error();
        break;
    /// ------------------------------- Router LogIn ------------------------------- /// 
    // Affichage de la page login
    case 'login' :
        login();
        break;
    // LogOut de l'administrateur. 
    case 'logout' :
        logout();
        break;
    // Vérification des identifiants de l'administrateur dans la vue logIn. 
    case 'checkLogIn' :
        if(isset($_POST['submit_logIn'])){
            // Si les champs existent et qu'ils ne sont pas vides.
            if(isset($_POST['emailAdmin'], $_POST['pwdAdmin']) AND !empty($_POST['emailAdmin']) AND !empty($_POST['pwdAdmin'])) {
                // Sécurisation des valeurs transmise par l'utilisateur:
                // Suppression des caractères spéciaux tel que les chevrons > & <, des antislashes et espaces inutiles.
                $checkEmailAdmin = htmlspecialchars(trim(stripslashes($_POST['emailAdmin'])));
                $checkPwdAdmin = htmlspecialchars(trim(stripslashes($_POST['pwdAdmin'])));
                // Appel de la fonction Vérification LogIn dans le controller Back. 
                getCheckLogin($checkEmailAdmin, $checkPwdAdmin);
            }
        }
        else{
            login();
        }
        break;
    /// ------------------------------- Router BACK ------------------------------- /// 
    // Affichage du dashboard pour l'administrateur.  
    case 'dashboard' :
        dashboard();
        break;
    // Affichage de la page ajout d'article dans le dashboard administrateur.
    case 'addArticle' :
        addArticle();
        break;
    // Ajout d'un nouvel article par l'administrateur
    case 'addNewArticle' : 
        if(isset($_POST['submit_article'])){
            // Si les champs existent et qu'ils ne sont pas vides.
            if(isset($_POST['titleNewPost'], $_POST['contentNewPost']) AND !empty($_POST['titleNewPost']) AND !empty($_POST['contentNewPost'])) {                       
                // Sécurisation des valeurs transmise par l'utilisateur:
                // Suppression des antislashes et espaces inutiles
                $titleNewPost = stripslashes(trim($_POST['titleNewPost']));
                $contentNewPost = stripslashes(trim($_POST['contentNewPost']));
                // Appel de la fonction addNewPost() dans le controller Back. 
                addNewPost($titleNewPost,$contentNewPost);
            }else{
                $errors = "Veuillez remplir tous les champs du formulaire";
                errorAddNewPost($errors);
            }
        }
        else{
            accueil();
        }
        break;
    // Affichage de la page modifier les articles dans le dashboard administrateur. 
    case 'modifyArticle' :
        modifyArticle();
        break;
    // Affichage de l'article en mode Edition dans le dashboard administrateur.
    case 'addModificationArticle' :
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            addModificationArticle($id);
        }
        else{
            accueil();
        }
        break;
    // Ajout/Submit d'une modification d'un article par l'administrateur.
    case 'newModificationArticle' : 
        if(isset($_POST['submit_modificationArticle']) AND (isset($_GET['id']) && $_GET['id'] > 0)){
            $id = intval($_GET['id']);
            // Si les champs existent et qu'ils ne sont pas vides.
            if(isset($_POST['titleModificationPost'], $_POST['contentAddModificationArticle']) AND !empty($_POST['titleModificationPost']) AND !empty($_POST['contentAddModificationArticle'])) {                       
                // Sécurisation des valeurs transmise par l'utilisateur:
                // Suppression des antislashes et espaces inutiles
                $titleModificationPost = stripslashes(trim($_POST['titleModificationPost']));
                $contentAddModificationArticle = stripslashes(trim($_POST['contentAddModificationArticle']));
                // Appel de la fonction addNewUpdatePost() dans le controller Back.                     
                addNewUpdatePost($titleModificationPost, $contentAddModificationArticle, $id);
            }
            // Si un des champs n'est pas correctement renseigné. 
            else{
                $errors = "Veuillez remplir tous les champs du formulaire";
                errorAddNewUpdatePost($errors, $id);
            }
        }
        else{
            accueil();
        }
        break;
    // Suppresion d'un article  
    case 'deleteArticle' : 
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            deleteThisArticle($id);
        }
        else{
            accueil();
        }
        break;
    // Affichage de la page modérer les commentaires dans le dashboard administrateur. 
    case 'moderateComments' :
        moderateComments();
        break;
    // Valider un commentaire signalé
    case 'validateThisComment' :
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $commentId = intval($_GET['id']);
            $isSignaled = NULL;
            // Appel de la fonction signalComment() dans le controller Front. 
            validateThisComment($isSignaled, $commentId);
        }
        else{
            accueil();
        }
        break;
    // Suppresion d'un commentaire 
    case 'deleteComment' :
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            deleteThisComment($id);
        }
        else{
            accueil();
        }
        break;
    default :
        accueil();
        break;
}