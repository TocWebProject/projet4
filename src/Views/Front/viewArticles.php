<?php $title = 'Jean Forteroche - Tous les articles'; ?>
<?php $ressourceCSS = 'src/Assets/ressources/css/all-articles.css'; ?>

<?php ob_start(); ?>

<!-- ========== HEADER ========== -->
<?php require('header.php'); ?>

<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top text-center">
    <a class="navbar-brand" href="index.php?action=accueil">
        <img src="src/Assets/img/pen-logo-jean-forteroche.svg" width="35" height="35" alt="pen-logo-jean-forteroche">
        <span class="navbar-text">Jean Forteroche</span>
    </a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-right" id="collapse_target">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=accueil">Accueil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=blog">Articles</a>
            </li>
            <?php
                if(isset($_SESSION['userid'])) {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?action=dashboard">Espace Administration</a></li>';
                }   
            ?>  
            <li class="nav-item">
                <?php
                    if(isset($_SESSION['userid'])) {
                        echo '<a class="nav-link" href="index.php?action=logout">Se Déconnecter</a>';
                    }
                    else{
                        echo '<a class="nav-link" href="index.php?action=login">Se Connecter</a>';
                    }       
                ?>  
            </li>
        </ul>
    </div>
</nav>

<section class="section_1_resume_all_articles">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="my-4 text-center animated fadeInUp">Tous les épisodes
                    <hr class="hr_section1">
                    <small>"Billet simple pour l'Alaska"</small>
                </h1>

                <?php    
                while ($post = $posts->fetch()) {
                ?>

                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $post['title']; ?></h2>
                            <p class="card-text"><?php echo extractContent($post['content'], 500); ?></p>
                            <a href="index.php?action=article&id=<?= $post['id']; ?>" class="btn btn-primary">Lire l'article &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            <?php echo htmlspecialchars(" Publié le " . $post['day_post'] . " à " . $post['hour_post']); ?> par
                            <span class="author"> Jean Forteroche</span>
                        </div>
                    </div>

                <?php
                };
                $posts->closeCursor(); // Termine le traitement de la requête
                ?>


            </div>
        </div>
    </div>
</section>

<!-- ========== FOOTER ========== -->
<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>