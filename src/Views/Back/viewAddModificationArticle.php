<?php $title = 'Jean Forteroche - Modifier un article'; ?>
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
      <li class="active">
        <a href="index.php?action=modifyArticle">Editer vos articles</a>
       </li>
      <li>
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
    <h2 class="text-center animated fadeInUp">Modifer votre article</h2>
    <p class="text-center">Modifier le contenu de votre blog en quelques instants</p>
    <div class="line"></div>

    <div class="container">
                <div class="row">
                  <div class="col-md-12 col-md-offset-3">
                    <div class="well well-sm">
                      <form class="form-horizontal" action="./index.php?action=newModificationArticle&id=<?php echo $post['id']; ?>" method="post">
                      <fieldset>                
                        <!-- Titre de l'épisode-->
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="titleModificationPost">Titre</label>
                          <div class="col-md-9">
                            <input name="titleModificationPost" id="titleModificationPost" type="text" placeholder="<?php echo $post['title']; ?>" class="form-control" type="text" required="">
                          </div>
                        </div>
                
                        <!-- Texte de l'épisode-->
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="contentAddModificationArticle">Votre texte</label>
                          <div class="col-md-12">
                            <textarea aria-label="content" class="form-control" id="contentAddModificationArticle" name="contentAddModificationArticle" rows="16" cols="100" type="text"><?php echo $post['content']; ?></textarea>
                          </div>
                        </div>
                
                        <!-- Publier l'épisode-->
                        <div class="form-group">
                          <div class="col-md-12 text-left">
                            <button type="submit" name="submit_modificationArticle" class="btn btn-primary btn-lg submitArticle">Modifier</button>
                          </div>
                        </div>
                      </fieldset>
                      </form>
                    </div>
                  </div>
                </div>
            </div>

  </div>



</div>

<div class="overlay"></div>

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>