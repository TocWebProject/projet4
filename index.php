<?php

session_start();

require('src/Controllers/ControllerFront.php');
require('src/Controllers/ControllerBack.php');


 if(isset($_GET["action"])) {
    if($_GET["action"] === "blog"){
        blog();
    }
    if($_GET["action"] === "accueil"){
        accueil();
    }
    if($_GET["action"] === "login"){
        login();
    }

    if($_GET["action"] === "logout"){
        logout();
    }

    if($_GET["action"] === "checkLogIn"){
            //Si l'utilisateur envoie ses informations personnels
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
                    // Vérification LogIn
                    getCheckLogin($checkEmailAdmin, $checkPwdAdmin);
    
                }
            }
        }
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
        
    if($_GET["action"] === "dashboard"){
        dashboard();
    }

    if($_GET["action"] === "addArticle"){
        addArticle();
    }

    if($_GET["action"] === "modifyArticle"){
        modifyArticle();
    }

    if($_GET["action"] === "moderateComments"){
        moderateComments();
    }

}