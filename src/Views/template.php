<!doctype html>
<html lang="fr">
    <head>
        <!-- Primary Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Page Title -->
        <title><?= $title ?></title>

        <!-- Canonical & Favicon -->	
        <link rel="canonical" href="https://tocwebproject.fr">
        <!-- <link rel="icon" type="image/png" href="#"/> -->
        
        <!-- Secondary Meta -->
        <meta name="description" content="Le blog de Jean Forteroche. Ecrivain">
        <meta name="author"      content="TocWebProject">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <!-- Material Design Bootstrap -->
        <link href="src/Assets/ext/css/mdb.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= $ressourceCSS ?>">

        <!-- Scrollbar Dashboard Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>
         <!-- ========== Content ========== -->
        <?= $content ?>

        <!-- Optional JavaScript -->
        <!-- TinyMCE CDN -->
        <script src="https://cdn.tiny.cloud/1/iq5gpg9kfrkc1sc9bkz25ccxrl6sajel8w3624zzrjz5985s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript" src="src/Assets/ext/js/jquery.min.js"></script>
        <script type="text/javascript" src="src/Assets/ext/js/popper.min.js"></script>
        <script type="text/javascript" src="src/Assets/ext/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="src/Assets/ext/js/mdb.min.js"></script>
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller for Dashboard CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Mouvement Sidebar Dashboard JS -->
        <script type="text/javascript" src="src/Assets/ressources/js/dashboardScrollbar.js"></script>
        <!-- TinyMCE init JS -->
        <script type="text/javascript" src="src/Assets/ressources/js/initTinyMCE.js"></script>

    </body>
</html>

