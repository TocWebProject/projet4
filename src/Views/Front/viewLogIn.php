<?php $title = 'Jean Forteroche - Se connecter'; ?>
<?php $ressourceCSS = 'src/Assets/ressources/css/log-in.css'; ?>

<?php ob_start(); ?>

<!-- ========== LOG IN FORM ========== -->
<section class="container-fluid bg align-middle text-center">
    <form class="form-signin" action="../../index.php?action=checkLogIn" id="getForm" method="POST">
        <img class="mb-4 rounded" src="src/Assets/img/pen-logo-jean-forteroche.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal animated fadeInUp">Se connecter</h1>
        <label for="inputEmail" class="sr-only">Adresse Email</label>
        <input type="email" name="emailAdmin" id="inputEmail" class="form-control" placeholder="Adresse Email" autocomplete="username" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" name="pwdAdmin" id="inputPassword" autocomplete="current-password" class="form-control" placeholder="Mot de passe" required="">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" id="check" value="remember-me"> Se souvenir de moi 
            </label>
        </div>
        <input class="btn btn-md btn-primary btn-block" type="submit" name="submit_logIn" value="connexion">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php?action=accueil">Retour au site</a></li>
        </ul>
        <p class="mt-3 mb-3 text-muted">© 2020 - TocWebProject</p>
    </form>
</section>

<!-- JS Local Storage -->
<script type="text/javascript" src="src/Assets/ressources/js/userLocalStorage.js"></script> 

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>