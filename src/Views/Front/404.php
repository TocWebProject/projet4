<?php $title = 'Jean Forteroche - Erreur 404'; ?>
<?php $ressourceCSS = 'src/Assets/ressources/css/404.css'; ?>

<?php ob_start(); ?>

<!-- ========== 404 Block ========== -->
<canvas id="canvas1"></canvas>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-6 block">
			<div class="text-center dark-grey-text">
                <img src="src/Assets/img/pen-logo-jean-forteroche.svg" class="rounded mx-auto d-block" alt="">
                 <h3 class="font-weight-bold">
                     Erreur 404 
                </h3>
                <p class="text-muted">
                    La page que vous chercher n'existe pas. Rendez vous sur la page d'accueil.
				</p>
				<p>
                    <a class="btn btn-grey btn-md ml-0"  href="index.php?action=accueil" role="button">Accueil<i class="fas fa-home ml-2"></i></a>
                </p>
			</div>
		</div>
	</div>
</div> 

<script type="text/javascript" src="src/Assets/ressources/js/animation404.js"></script> 

<?php $content = ob_get_clean(); ?>

<?php require('src/Views/template.php'); ?>