<?php $title = 'Jean Forteroche - Modérer les commentaires'; ?>
<?php $ressourceCSS = 'src/Assets/ressources/css/dashboard.css'; ?>

<?php ob_start(); ?>

<div class="wrapper">
  <!-- Sidebar Menu -->
  <nav id="sidebar">
    <div id="dismiss">
      <i class="fas fa-arrow-left"></i>
    </div>

    <div class="sidebar-header">
      <h3>Jean</br>Forteroche</br>Administration</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Mettre à jour votre blog</p>
        <li>
            <a href="index.php?action=dashboard">Accueil</a>
        </li>
        <li>
            <a href="index.php?action=addArticle">Créer un article</a>
        </li>
        <li>
            <a href="index.php?action=modifyArticle">Editer vos articles</a>
        </li>
        <li class="active">
            <a href="index.php?action=moderateComments">Modérer les commentaires</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
      <li>
        <a href="index.php?action=accueil" class="backToBlog">Retour au Blog</a>
      </li>
      <li>
        <a href="index.php?action=logout" class="deconnexion">Se déconnecter</a>
      </li>
    </ul>
  </nav>

  <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand animated fadeInLeft" href="index.php?action=accueil" target="_blank">
            <img src="src/Assets/img/pen-logo-jean-forteroche.svg" width="35" height="35" alt="pen-logo-jean-forteroche">
            <span class="navbar-text">Jean Forteroche</span>
            </a>
            <button type="button" id="sidebarCollapse" class="btn tools animated fadeInRight">
            <i class="fas fa-align-left"></i>
            <span>Outils</span>
            </button>
        </div>
        </nav>
        <div class="col-12 narrow text-center mx-auto" style="width: 600px;">
            <img src="src/Assets/img/livre_sable_jean_forteroche.jpg" alt="classic_pen" class="w-25 rounded-pill border border-dark view">
        </div>
        <h2 class="text-center animated fadeInUp">Mettez à jour votre blog</h2>
        <p class="text-center">Modération des commentaires</p>
        <div class="line"></div>

        <?php
        if($newCountSignaledComments == 0){
           echo'<h4 class="text-center">Aucun commentaire signalé</h4>';
        }
        else{
           echo'<h4 class="text-center">Liste des commentaires signalés:</h4>';
        }
        ?>    
        <!-- Tableau de tous les commentaires Signalés -->
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col ">Commentaires signalés</th>
                        <th scope="col">Lire / Valider / Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                    // Requête des commentaires Signalés
                    while ($signaledComment = $signaledComments->fetch()) {
                    ?>

                    <tr>
                        <td>
                            <?php echo htmlspecialchars($signaledComment['articleid']); ?>
                        </td>
                        <td>
                            "<?php echo htmlspecialchars($signaledComment['comment']); ?>" écrit par <?php echo htmlspecialchars($signaledComment['author']); ?> <?php echo htmlspecialchars(" et publié le " . $signaledComment['day_post']); ?>
                        </td>
                        <td>
                            <a href="index.php?action=article&id=<?= $signaledComment['articleid']; ?>" target = "_blank"><button type="button" class="btn btn-outline-primary btn-sm" title="Voir le commentaire"><i class="fas fa-eye"></i></button></a>
                            <a href="index.php?action=validateThisComment&id=<?= $signaledComment['id']; ?>"><button type="button" class="btn btn-outline-success btn-sm" title="Valider ce commentaire"><i class="fas fa-check-circle"></i></button></a>
                            <a href="index.php?action=deleteComment&id=<?= $signaledComment['id']; ?>" onClick='return confirmation();'><button type="button" class="btn btn-outline-danger btn-sm" title="Supprimer ce commentaire"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>

                    <?php
                    };
                    $signaledComments->closeCursor(); // Termine le traitement de la requête
                    ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
        <div class="line"></div>

        <h4 class="text-center">Liste des commentaires par date de publication:</h4>

        <!-- Tableau de tous les commentaires du blog -->              
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col ">Commentaires</th>
                        <th scope="col">Lire / Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    // Requête tous les commentaires du blogs. 
                    while ($comment = $comments->fetch()) {
                    ?>

                    <tr>
                        <td><?php echo htmlspecialchars($comment['articleid']); ?></td>
                        <td>"<?php echo htmlspecialchars($comment['comment']); ?>" écrit par <?php echo htmlspecialchars($comment['author']); ?> <?php echo htmlspecialchars(" et publié le " . $comment['day_post']); ?></td>
                        <td>
                        <a href="index.php?action=article&id=<?= $comment['articleid']; ?>" target = "_blank"><button type="button" class="btn btn-outline-primary btn-sm" title="Voir ce commentaire"><i class="fas fa-eye"></i></button></a>
                        <a href="index.php?action=deleteComment&id=<?= $comment['id']; ?>" onClick='return confirmation();'><button type="button" class="btn btn-outline-danger btn-sm" title="Supprimer ce commentaire"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>

                    <?php
                    };
                    $comments->closeCursor(); // Termine le traitement de la requête
                    ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="overlay"></div>

<script type="text/javascript" src="src/Assets/ressources/js/deleteCommentConfirmation.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>