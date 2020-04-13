<?php

function dashboard(){
    require ('src/Views/Back/viewHomeDashboard.php');
}

function addArticle(){
    require ('src/Views/Back/viewAddArticleDashboard.php');
}

function modifyArticle(){
    $posts = getPosts();
    require ('src/Views/Back/viewModifyArticleDashboard.php');
}

function moderateComments(){
    $comments = getAllComments();
    require ('src/Views/Back/viewCommentsModeration.php');
}
