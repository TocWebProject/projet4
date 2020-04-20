<?php $title = 'Jean Forteroche - Article'; ?>
<?php $ressourceCSS = 'src/Assets/ressources/css/single-article.css'; ?>

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
            <li class="nav-item">
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


<!-- Page Content -->
<section class="section_1_single_article">        
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Content Column -->
            <div class="col-lg-8">     
                <!-- Title -->
                <h1 class="mt-4 animated fadeInLeft"><?php echo $post['title']; ?></h1>
                <!-- Author -->
                <p class="by lead animated fadeInUp">
                by <span class="author">Jean Forteroche</span>
                </p>
                <hr>
                <!-- Date/Time -->
                <?php echo " Publié le " . $post['day_post']; ?>
            
                <hr>
            
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
            
                <hr>

                <!-- Post Content -->
                <div class="container">
                    <!-- Post Content -->                
                    <?php echo $post['content']; ?>
        

                    <hr>
                    <!-- Background Image Parallax -->
                    <div class="parallax">

                    </div>
                    <hr>

                    <!-- Comments Form -->
                    <div class="card my-4">
                        <h5 class="card-header">Laisser un commentaire:</h5>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="userName">Votre Pseudo:</label>
                                        <input id="userName" name="userName" class="form-control col-7" type="text" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment">Votre commentaire:</label>
                                        <textarea id="comment" name="comment" class="form-control" rows="5" type="text" required=""></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit_comment">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
        

                <?php
                    
                    while ($comment = $comments->fetch()) {
                        ?>



                <!-- Single Comment -->
                <div class="media mb-4 comment">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo htmlspecialchars($comment['author']); ?></h5>
                        <p class="comment_date"><?php echo htmlspecialchars(" Publié le " . $comment['day_post']); ?></p>
                        <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                        <a href="#" method="post">Signaler ce commentaire</a>
                    </div>
                </div>

                <?php
                };

                $comments->closeCursor(); // Termine le traitement de la requête
                ?>

            </div> 
        </div>
    </div>  
</section>

<!-- ========== FOOTER ========== -->
<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>