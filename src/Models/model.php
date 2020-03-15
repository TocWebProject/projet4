<?php

function getPosts() {

    try
    {
        $db = new PDO('mysql:host=localhost;dbname=jeanForteroche-blog;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $posts = $db -> query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y') AS day_post, DATE_FORMAT(creation_date, '%Hh%imin%ss') AS hour_post  FROM articles ORDER BY id DESC");

    return $posts;

} 