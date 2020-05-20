<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CV - Massé Jérémy</title>
        <!--bootstrap-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light py-3 nav_admin" id="mainNav">
            <a class="navbar-brand js-scroll-trigger acc" href="index.php"><p>Accueil</p></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </nav>
        <?php
            $pdo = new PDO('mysql:host=localhost;dbname=sitecv', 'root', '', 
            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            if (empty($_GET['catego']))
                $_GET['catego'] = "experiences";//on initialise la catégorie à experience 
            if (!empty($_POST)) {
                if($_GET["catego"] == "experiences"){ //PARTIE MODIFIER AJOUTER ET SUPPRIMER EXPERIENCE
                    $_POST["titre"] = htmlentities($_POST["titre"], ENT_QUOTES);
                    $_POST["date_deb"] = htmlentities($_POST["date_deb"], ENT_QUOTES);
                    $_POST["date_fin"] = htmlentities($_POST["date_fin"], ENT_QUOTES);
                    $_POST["description"] = htmlentities($_POST["description"], ENT_QUOTES);
                    $_POST["information"] = htmlentities($_POST["information"], ENT_QUOTES);
                    if(!empty($_GET["id_modif_expe"])) { //Pour modifer une experience
                        $result_modif = $pdo->exec("UPDATE experiences SET 
                            titre = '$_POST[titre]',
                            date_debut = '$_POST[date_deb]',
                            date_fin = '$_POST[date_fin]',
                            description = '$_POST[description]',
                            information = '$_POST[information]'
                            WHERE id_expe = $_GET[id_modif_expe]");
                    }
                    else{ // Pour ajouter une experience
                        $result_add = $pdo->exec("INSERT INTO experiences (titre, description, information, date_debut, date_fin)
                        VALUES ('$_POST[titre]', '$_POST[description]', '$_POST[information]', '$_POST[date_deb]', '$_POST[date_fin]')");
                    }
                }
                    if($_GET["catego"] == "formations"){ //PARTIE MODIFIER AJOUTER ET SUPPRIMER FORMATIONS
                        $_POST["nom_ecole"] = htmlentities($_POST["nom_ecole"], ENT_QUOTES);
                        $_POST["date_obt"] = htmlentities($_POST["date_obt"], ENT_QUOTES);
                        $_POST["diplome"] = htmlentities($_POST["diplome"], ENT_QUOTES);
                        if(!empty($_GET["id_modif_form"])) { //Pour modifer une formation
                            $result_modif_form = $pdo->exec("UPDATE formations SET 
                                nom_ecole = '$_POST[nom_ecole]',
                                date_obt = '$_POST[date_obt]',
                                diplome = '$_POST[diplome]',
                                WHERE id_form = $_GET[id_modif_form]");
                        }
                        else{ // Pour ajouter une formation
                            $result_add_form = $pdo->exec("INSERT INTO formations (nom_ecole, date_obt, diplome)
                            VALUES ('$_POST[nom_ecole]', '$_POST[date_obt]', '$_POST[diplome]')");
                        }
                    }
                    if($_GET["catego"] == "competences"){ //PARTIE MODIFIER AJOUTER ET SUPPRIMER FORMATIONS
                        $_POST["nom_comp"] = htmlentities($_POST["nom_comp"], ENT_QUOTES);
                        $_POST["niveau"] = htmlentities($_POST["niveau"], ENT_QUOTES);
                        $_POST["categorie"] = htmlentities($_POST["categorie"], ENT_QUOTES);
                        if(!empty($_GET["id_modif_comp"])) { //Pour modifer une formation
                            $result_modif_form = $pdo->exec("UPDATE competences SET 
                                nom_comp = '$_POST[nom_comp]',
                                niveau = '$_POST[niveau]',
                                categorie = '$_POST[categorie]',
                                WHERE id_comp = $_GET[id_modif_comp]");
                        }
                        else{ // Pour ajouter une formation
                            $result_add_comp = $pdo->exec("INSERT INTO competences (nom_comp, niveau, categorie)
                            VALUES ('$_POST[nom_comp]', '$_POST[niveau]', '$_POST[categorie]')");
                        }
                    }
            }
            if(!empty($_GET["id_suppr_form"])) { //pour supprimer une formation
                $result_supp_form = $pdo->exec("DELETE FROM formations WHERE id_form = '$_GET[id_suppr_form]'");
                header("location:administration.php?catego=".$_GET['catego']);
            }
            //Pour pré-remplir les champs du formulaire quand on veut modifier une formation
            if(!empty($_GET["id_modif_form"])) { 
                $result_form = $pdo->query("SELECT * FROM formations where id_form = '$_GET[id_modif_form]'");
                $formations = $result_form->fetch(PDO::FETCH_OBJ);
            }
            // Pour supprimer une expérience
            if(!empty($_GET["id_suppr_expe"])) { 
                $result_supp_expe = $pdo->exec("DELETE FROM experiences WHERE id_expe = '$_GET[id_suppr_expe]'");
                header("location:administration.php?catego=".$_GET['catego']);
            }
            //Pour pré-remplir les champs du formulaire quand on veut modifier une experience
            if(!empty($_GET["id_modif_expe"])) { 
                $result_exp = $pdo->query("SELECT * FROM experiences where id_expe = '$_GET[id_modif_expe]'");
                $experiences = $result_exp->fetch(PDO::FETCH_OBJ);
            }
            // Pour supprimer une competences
            if(!empty($_GET["id_suppr_comp"])) { 
                $result_supp_comp = $pdo->exec("DELETE FROM competences WHERE id_comp = '$_GET[id_suppr_comp]'");
                header("location:administration.php?catego=".$_GET['catego']);
            }
            //Pour pré-remplir les champs du formulaire quand on veut modifier une competences
            if(!empty($_GET["id_modif_comp"])) { 
                $result_comp = $pdo->query("SELECT * FROM competences where id_comp = '$_GET[id_modif_comp]'");
                $competences = $result_comp->fetch(PDO::FETCH_OBJ);
            }
            
        ?>
        <script>
            function changerCatego(valeur)
            {
                window.location.assign("administration.php?catego="+valeur) //permet de changer directement l'affichage de la page
            }
        </script>
        <div class="container">  
            <form class="form_admin"method="POST" action="">
                <select class="form-control" onchange =changerCatego(this.value)>
                    <option <?php if($_GET['catego'] == 'experiences') { ?> selected <?php } ?>value="experiences">Expériences</option>
                    <option <?php if($_GET['catego'] == 'formations') { ?> selected <?php } ?> value="formations">Formations</option>
                    <option <?php if($_GET['catego'] == 'competences') { ?> selected <?php } ?> value="competences">Compétences</option>
                    <option <?php if($_GET['catego'] == 'portfolios') { ?> selected <?php } ?> value="portfolios">Portfolio</option>
                </select>
                <!-- experiences-->
                <?php if($_GET['catego'] == "experiences"){ ?>
                <div class="form-group">
                    <label for="date_deb">Date de début d'expérience</label>
                    <input type="text" class="form-control" id="date_deb" placeholder = "2000-05-23" name="date_deb" value="<?php if(!empty($_GET["id_modif_expe"])) echo $experiences->date_debut ?>">
                </div>
                <div class="form-group">
                    <label for="date_fin">Date de fin d'expérience</label>
                    <input type="text" class="form-control" id="date_fin" placeholder = "2000-05-24" name="date_fin" value="<?php if(!empty($_GET["id_modif_expe"])) echo $experiences->date_fin ?>">
                </div>
                <div class="form-group">
                    <label for="titre">Titre de l'expérience</label>
                    <input type="texte" class="form-control" id="titre" name="titre" value="<?php if(!empty($_GET["id_modif_expe"])) echo $experiences->titre ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description de l'experience</label>
                    <textarea rows="2" class="form-control" id="description" name="description"><?php if(!empty($_GET["id_modif_expe"])) echo $experiences->description ?></textarea>
                </div>

                <div class="form-group">
                    <label for="information">Information de l'experience</label>
                    <textarea rows="5" class="form-control" id="information" name="information"><?php if(!empty($_GET["id_modif_expe"])) echo $experiences->information ?></textarea>
                </div>
                <?php }else if ($_GET["catego"] == "formations"){?>

                <!-- formations -->
                <div class="form-group">
                    <label for="date_obt">Date d'obtention ou de début de la formation</label>
                    <input type="text" class="form-control" id="date_obt" placeholder = "2000-05-23" name="date_obt" value="<?php if(!empty($_GET["id_modif_form"])) echo $formations->date_obt ?>">
                </div>
                <div class="form-group">
                    <label for="nom_ecole">Nom de l'école</label>
                    <input type="texte" class="form-control" id="nom_ecole" name="nom_ecole" value="<?php if(!empty($_GET["id_modif_form"])) echo $formations->nom_ecole ?>">
                </div>
                <div class="form-group">
                    <label for="diplome">dîplome</label>
                    <input type="text" class="form-control" id="diplome" name="diplome" value ="<?php if(!empty($_GET["id_modif_form"])) echo $formations->diplome ?>">
                </div>
                <?php }else if ($_GET["catego"] == "competences"){?>

                <!-- competences PAS EU LE TEMPS DE FINIR MAIS IL S AGIT D'UN COPIER COLLER DES 2 AUTRES PARTIES-->
                <div class="form-group">
                    <label for="nom_comp">Nom de la compétence</label>
                    <input type="text" class="form-control" id="nom_comp" name="nom_comp" value="<?php if(!empty($_GET["id_modif_comp"])) echo $competences->nom_comp ?>">
                </div>
                <div class="form-group">
                    <label for="niveau">Note sur 10 de maitrise de la competence</label>
                    <input type="text" class="form-control" id="niveau" name="niveau" value="<?php if(!empty($_GET["id_modif_comp"])) echo $competences->niveau ?>">
                </div>
                <select class="form-control" name="categorie">
                    <option <?php if(!empty($_GET["id_modif_comp"]) and $competences->categorie == 'web') { ?> selected <?php } ?> value="web">Web</option>
                    <option <?php if(!empty($_GET["id_modif_comp"]) and $competences->categorie == 'logiciel') { ?> selected <?php } ?> value="logiciel">Logiciel</option>
                    <option <?php if(!empty($_GET["id_modif_comp"]) and $competences->categorie == 'reseaux') { ?> selected <?php } ?> value="reseaux">Réseaux</option>
                </select>
                <?php }else {?>

                <!-- portfolio  PAS EU LE TEMPS DE FINIR CETTE PARTIE--> 
                <div class="form-group">
                    <label for="titre_proj">Titre du projet</label>
                    <input type="text" class="form-control" id="titre_proj" name="titre_proj" value="<?php if(!empty($_GET["id_modif_expe"])) echo $experiences->date_debut ?>">
                </div>
                <div class="form-group">
                    <label for="desc_proj">Description du projet</label>
                    <textarea rows="2" class="form-control" id="desc_proj" name="desc_proj"><?php if(!empty($_GET["id_modif_expe"])) echo $experiences->description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="img">Photo</label>
                    <input type="file" class="form-control-file" id="img" name="img[]">
                </div>
                <?php } ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Enregistrer</button>
                    <?php if(!empty($_GET["id_modif_expe"]) or !empty($_GET["id_modif_form"])) { ?>
                        <a class="btn btn-primary form-control annuler" href="administration.php?">Annuler</a>
                    <?php } ?>
                </div>
            </form>
        </div>
        <section class="page-section bg-info">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <?php //cette partie affiche le titre ou nom de chaque partie avec les icones modifier ou supprimer
                            if ($_GET["catego"] == "experiences"){ 
                                $id = "id_expe";
                                $nom = "titre";
                                $lien = "expe=";
                            }
                            else if ($_GET["catego"] == "formations"){
                                $id = "id_form";
                                $nom = "nom_ecole";
                                $lien = "form=";
                            }
                            else if ($_GET["catego"] == "competences"){
                                $id = "id_comp";
                                $nom = "nom_comp";
                                $lien = "comp=";
                            }
                            else if ($_GET["catego"] == "portfolio"){
                                $id = "id_port";
                                $nom = "nom_portfolio";
                                $lien = "port=";
                            }
                            $result_select = $pdo->query("SELECT * FROM $_GET[catego]");
                            while ($resultats = $result_select->fetch(PDO::FETCH_OBJ)) {?>
                                <div class="card-body exp">
                                    <a href="administration.php?catego=<?php echo $_GET["catego"]."&id_modif_".$lien.$resultats->$id; ?>"><i class="fas fa-pen"></i></a>
                                    <a href="administration.php?catego=<?php echo $_GET["catego"]."&id_suppr_".$lien.$resultats->$id; ?>"><i class="fas fa-trash-alt"></i></a>
                                    <h5 class="card-title"><?php echo $resultats->$nom. "<br"; ?></h5>
                                    <hr class="light my-4" />
                                </div>
                        <?php }?>
                    </div>
                </div>
            </div>                    
        </section>
    </body>
</html>