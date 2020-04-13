<?php $title = 'Jean Forteroche - Ajouter un article'; ?>
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
      <li class="active">
        <a href="index.php?action=addArticle">Créer un article</a>
      </li>
      <li>
        <a href="index.php?action=modifyArticle">Editer vos articles</a>
       </li>
      <li>
        <a href="index.php?action=moderateComments">Modérer les commentaires</a>
      </li>
    </ul>

    <ul class="list-unstyled CTAs">
      <li>
        <a href="#" class="backToBlog">Retour au Blog</a>
      </li>
      <li>
        <a href="#" class="deconnexion">Se déconnecter</a>
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
    <h2 class="text-center animated fadeInUp">Créer un nouvel article</h2>
    <p class="text-center">Ajouter du contenu à votre blog en quelques instants</p>
    <div class="line"></div>

    <div class="container">
                <div class="row">
                  <div class="col-md-12 col-md-offset-3">
                    <div class="well well-sm">
                      <form class="form-horizontal" action="#" method="post">
                      <fieldset>                
                        <!-- Titre de l'épisode-->
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="title">Titre</label>
                          <div class="col-md-9">
                            <input name="titleNewPost" type="text" placeholder="Votre titre" class="form-control">
                          </div>
                        </div>
                
                        <!-- Texte de l'épisode-->
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="message">Votre texte</label>
                          <div class="col-md-12">
                            <textarea aria-label="content" class="form-control" id="contentNewPost" name="contentNewPost" placeholder="Déposer le nouvel épisode ici..." rows="16" cols="100"></textarea>
                          </div>
                        </div>
                
                        <!-- Publier l'épisode-->
                        <div class="form-group">
                          <div class="col-md-12 text-left">
                            <button type="submit" class="btn btn-primary btn-lg submitArticle">Publier</button>
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