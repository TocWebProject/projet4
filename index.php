<?php

session_start();

require('src/Controllers/ControllerFront.php');
require('src/Controllers/ControllerBack.php');


 if(isset($_GET["action"])) {

    // Affichage de la liste des articles. 
    if($_GET["action"] === "blog"){
        // Appel de la fonction blog() dans le controller Front. 
        blog();
    }

    //Affichage de la page Accueil
    if($_GET["action"] === "accueil"){
        // Appel de la fonction accueil() dans le controller Front. 
        accueil();
    }

    // Affichage de la page login
    if($_GET["action"] === "login"){
        // Appel de la fonction logIn() dans le controller Front. 
        login();
    }

    // LogOut de l'administrateur. 
    if($_GET["action"] === "logout"){
        // Appel de la fonction logout() dans le controller Front. 
        logout();
    }

    // Vérification des identifiants de l'administrateur dans la vue logIn. 
    if($_GET["action"] === "checkLogIn"){
            //Si l'utilisateur envoie ses informations personnels via le btn submit. 
            if(isset($_POST['submit_logIn'])){
                // Si les champs existent et qu'ils ne sont pas vides.
                if(isset($_POST['emailAdmin'], $_POST['pwdAdmin']) AND !empty($_POST['emailAdmin']) AND !empty($_POST['pwdAdmin'])) {
                    // Sécurisation des valeurs transmise par l'utilisateur:
                    // Suppression des espaces inutiles
                    $checkEmailAdmin = trim($_POST['emailAdmin']);
                    $checkPwdAdmin = trim($_POST['pwdAdmin']);
                    // Suppression des antislashes 
                    $checkEmailAdmin = stripslashes($_POST['emailAdmin']);
                    $checkPwdAdmin = stripslashes($_POST['pwdAdmin']);
                    // Suppression des caractères spéciaux tel que les chevrons > & <
                    $checkEmailAdmin = htmlspecialchars($_POST['emailAdmin']);
                    $checkPwdAdmin = htmlspecialchars($_POST['pwdAdmin']);
                    // Appel de la fonction Vérification LogIn dans le controller Back. 
                    getCheckLogin($checkEmailAdmin, $checkPwdAdmin);
    
                }
            }
        }

    // Achichage d'un article précis grace à son ID.     
    if($_GET["action"] === "article"){
        if(isset($_GET["id"])) {
            $id = intval($_GET["id"]);
            singlePost($id);
        }
        //Si l'utilisateur envoie un commentaire
        if(isset($_POST['submit_comment'])){
            // Si les champs existent et qu'ils ne sont pas vides.
            if(isset($_POST['userName'], $_POST['comment']) AND !empty($_POST['userName']) AND !empty($_POST['comment'])) {
                // Sécurisation des valeurs transmise par l'utilisateur:
                // Suppression des espaces inutiles
                $userName = trim($_POST['userName']);
                $comment = trim($_POST['comment']);
                // Suppression des antislashes 
                $userName = stripslashes($_POST['userName']);
                $comment = stripslashes($_POST['comment']);
                // Suppression des caractères spéciaux tel que les chevrons > & <
                $userName = htmlspecialchars($_POST['userName']);
                $comment = htmlspecialchars($_POST['comment']);
                $id = intval($_GET["id"]);
                addNewComment($id, $userName, $comment);
            }
        }
    } 
    
    // Affichage du dashboard pour l'administrateur. 
    if($_GET["action"] === "dashboard"){
        // Appel de la fonction dashboard() dans le controller Back. 
        dashboard();
    }

    // Affichage de la page ajout d'article dans le dashboard administrateur. 
    if($_GET["action"] === "addArticle"){
        // Appel de la fonction addArticle() dans le controller Back. 
        addArticle();        
    }

    // Ajout d'un nouvel article par l'administrateur
    if($_GET["action"] === "addNewArticle"){
        //Si l'administrateur crée un nouvel article
        if(isset($_POST['submit_article'])){
            // Si les champs existent et qu'ils ne sont pas vides.
            if(isset($_POST['titleNewPost'], $_POST['contentNewPost']) AND !empty($_POST['titleNewPost']) AND !empty($_POST['contentNewPost'])) {                       
                // Sécurisation des valeurs transmise par l'utilisateur:
                // Suppression des espaces inutiles
                $titleNewPost = trim($_POST['titleNewPost']);
                $contentNewPost = trim($_POST['contentNewPost']);
                // Suppression des antislashes 
                $titleNewPost = stripslashes($_POST['titleNewPost']);
                $contentNewPost = stripslashes($_POST['contentNewPost']);
                // Appel de la fonction addNewPost() dans le controller Back. 
                addNewPost($titleNewPost,$contentNewPost);
            }
        }
    }


    // Affichage de la page modifier les articles dans le dashboard administrateur. 
    if($_GET["action"] === "modifyArticle"){
        // Appel de la fonction modifyArticle() dans le controller Back. 
        modifyArticle();
    }

    // Affichage de la page modérer les commentaires dans le dashboard administrateur. 
    if($_GET["action"] === "moderateComments"){
        // Appel de la fonction moderateComments() dans le controller Back. 
        moderateComments();
    }

}