<div class="col-12 narrow text-center mx-auto animated fadeInUp" style="width: 600px;">
    <div class=" card">
        <div class="card-header text-danger">
            Information Importante
        </div>
        <div class="card-body">
            <h5 class="card-title">Vous avez <?php echo htmlspecialchars($newCountSignaledComments); ?> commentaires signalés à étudier</h5>
            <p class="card-text">Rendez vous dans votre espace permettant la modération des commentaires</p>
            <a href="index.php?action=moderateComments" class="btn btn-primary moderateComment">Modérer les commentaires</a>
        </div>
    </div>
</div>