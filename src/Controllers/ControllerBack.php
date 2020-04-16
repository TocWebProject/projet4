<?php

function dashboard(){
    if(isset($_SESSION['userid'])){
    require ('src/Views/Back/viewHomeDashboard.php');
    }
    else {
        header('location: ./index.php?action=accueil');
    }
}

function addArticle(){
    if(isset($_SESSION['userid'])){
        require ('src/Views/Back/viewAddArticleDashboard.php');
        }
        else {
            header('location: ./index.php?action=accueil');
        }
}

function modifyArticle(){
    if(isset($_SESSION['userid'])){
        $posts = getPosts();
        require ('src/Views/Back/viewModifyArticleDashboard.php');
        }
        else {
            header('location: ./index.php?action=accueil');
        }
}

function moderateComments(){
    if(isset($_SESSION['userid'])){
        $comments = getAllComments();
        require ('src/Views/Back/viewCommentsModeration.php');
        }
        else {
            header('location: ./index.php?action=accueil');
        }
}
