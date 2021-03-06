<?php $title = 'Jean Forteroche - Administration'; ?>
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
      <li class="active">
        <a href="index.php?action=dashboard">Accueil</a>
      </li>
      <li>
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
    <h2 class="text-center animated fadeInUp">Bienvenue dans votre espace d'administration</h2>
    <p class="text-center">Mettez à jour simplement votre blog grâce à cette interface d'administration. Vous serez ici en mesure de créer des nouveaux articles, de modifier ou supprimer vos articles déjà postés, restez attentif en modérant les commentaires déposés par vos visiteurs, le tout grâce à votre boite à outils...Enjoi !</p>
    <div class="line"></div>

    <!-- Information sur le nombre de commentaires signalés  -->
    <?php
      if($newCountSignaledComments == 0){
        
        require('viewInformationSucessDashboard.php');

      } else{
        require('viewInformationDangerDashboard.php');
      }
    ?>

  </div>

</div>

<div class="overlay"></div>

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>