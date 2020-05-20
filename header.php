<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CV - Massé Jérémy</title>
        <!--bootstrap-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Accueil</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experiences">Expériences</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#formations">Formations</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#competences">Compétences</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <?php 
                            if(!empty($_SESSION)){
                                if($_SESSION["connect"] == 1){ ?>
                                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="administration.php">Administration</a></li>
                                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="deconnexion.php">Déconnexion</a></li>
                        <?php }}
                            else {?>
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                                <li class="nav-item connexion"><a class="nav-link js-scroll-trigger" href="#">Connexion</a></li>
                        <?php }?>
                    </ul>
                </div>
                <form method="post" action="">
                <div id="interf_compte">
                    <div id="pseudo">
                        <label for="pseudo">pseudo :</label>
                        <input class="couleur" type="text" name="pseudo" value="" required>
                    </div>
                    <div id="MDP">
                        <label for="mdp">MDP :</label>
                        <input class="couleur" type="text" name="mdp" value="" required>
                    </div>
                    <button class="couleur" id="connect" type="submit" name="connect">Se connecter</button>
                </div>
                </form>
            </div>
        </nav>

