<?php $title = 'Jean Forteroche - Gérer les articles'; ?>
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
            <a href="#">Modérer les commentaires</a>
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
        <h2 class="text-center animated fadeInUp">Mettez à jour votre blog</h2>
        <p class="text-center">Modifier ou Supprimer vos articles à votre guise</p>
        <div class="line"></div>

        <h4 class="text-center">Liste des articles:</h4>

        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" class="w-25">Identifiant</th>
                        <th scope="col " class="w-25">Titre</th>
                        <th scope="col" class="w-25">Lire / Modifer / Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row d-flex justify-content-center">1</th>
                        <td>Article 1</td>
                        <td>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row d-flex justify-content-center">2</th>
                        <td>Article 2</td>
                        <td>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row d-flex justify-content-center">3</th>
                        <td>Article 3</td>
                        <td>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button>
                        <button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>



</div>

<div class="overlay"></div>

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>