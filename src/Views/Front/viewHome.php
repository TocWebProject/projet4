<?php $title = 'Jean Forteroche - Accueil'; ?>
<?php $ressourceCSS = 'src/Assets/ressources/css/home.css'; ?>

<?php ob_start(); ?>

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=accueil">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=blog">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=login">Se Connecter</a>
            </li>
        </ul>
    </div>
</nav>

<!-- ========== Section 1 - Last 3 articles ========== -->
<section class="section_1_last_articles ">
    <h2 class="display-5 text-center animated fadeInUp">Les derniers épisodes</h2>
    <hr class="hr_section1 animated fadeInUp">
    <div class="row">

    <?php                
       
    while ($lastArticle = $lastThreePosts->fetch()) {
                        
        ?>

        <div class="col-lg-4 text-center animated fadeInUp">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2><?php echo htmlspecialchars($lastArticle['title']); ?></h2>
            <p><?php echo htmlspecialchars(getExtractContent($lastArticle['content'], 250)); ?></p>
            <p><a class="btn btn-secondary" href="index.php?action=article&id=<?= $lastArticle['id']; ?>" role="button">Lire »</a></p>
        </div>


    <?php
    };
    $lastThreePosts->closeCursor(); // Termine le traitement de la requête
        ?>



    </div>
</section>

<!-- ========== Section 2 - Call to see all articles ========== -->
<section class="section_2_call_all_articles">
    <div class="col-12 narrow text-center mx-auto" style="width: 600px;">
        <img src="src/Assets/img/livre_sable_jean_forteroche.jpg" alt="classic_pen" class="w-25 rounded-pill border border-dark view">
        <hr>
        <h4>Tous les épisodes de mon livre:</h4>
        <p class="lead"><em>"Billet simple pour l'Alaska"</em></p>
        <a class="btn btn-secondary btn-md view" href="index.php?action=blog" target="_blank">Cliquez ici</a>
        <hr>
    </div>
</section>


<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>