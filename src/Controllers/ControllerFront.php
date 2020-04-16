<?php

require('src/Models/model.php');


function blog(){
    
    $posts = getPosts();
    require ('src/Views/Front/viewArticles.php');

}

function accueil(){
    
    $lastThreePosts = lastThreeArticles();
    require ('src/Views/Front/viewHome.php');
}

function getExtractContent($string, $max_length){
    $newExtract = extractContent($string, $max_length);
    return $newExtract;
}

function login(){

    require ('src/Views/Front/viewLogIn.php');
}

function getCheckLogin($checkEmailAdmin, $checkPwdAdmin){
    
    $newLogIn = checkLogin($checkEmailAdmin, $checkPwdAdmin);

}

function logout(){

    session_unset();
    session_destroy();
    accueil();
    
}


function singlePost($id){

    if (isset($id) && $id > 0) {
        
        $post = getPost($id);
        $comments = getComments($id);
        require ('src/Views/Front/viewSingleArticle.php');
    }

    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }  
}

function addNewComment($id, $userName, $comment){

    $newComment = addComment($id, $userName, $comment);
}
   

