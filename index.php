<?php

// Connexion à la base de données
try
{
    $db = new PDO('mysql:host=localhost;dbname=jeanForteroche-blog;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$posts = $db -> query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y') AS day_post, DATE_FORMAT(creation_date, '%Hh%imin%ss') AS hour_post  FROM articles ORDER BY id DESC");

while ($post = $posts->fetch()) {
    ?>

    <div class="news">
        <h3><?php echo $post['title'] . " Publié le " . $post['day_post'] . " à " . $post['hour_post']; ?>  </h3>
        <p><?php echo $post['content']; ?></p>
    </div>

<?php
    };

$posts->closeCursor(); // Termine le traitement de la requête
?>
