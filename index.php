<?php include("login.php"); ?>
<?php include("header.php"); ?>
    
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Massé Jérémy</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Bienvenue sur mon site CV, défilez pour me découvrir!</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#experiences">Commençons</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- experience-->
        <section class="page-section bg-primary" id="experiences">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Experiences</h2>
                        <hr class="divider light my-4" />
                        <?php 
                         //Affichage de la partie experiences par une boucle
                            $result_exp = $pdo->query("SELECT * FROM experiences");
                            while ($experiences = $result_exp->fetch(PDO::FETCH_OBJ)) {?> 
                                <div class="card-body exp">
                                    <h5 class="card-title"><?php echo $experiences->titre. "<br"; ?></h5>
                                    <p><?php echo $experiences->date_debut."/".$experiences->date_fin;?></p>
                                    <p class="text-white-50"><?php echo $experiences->description ?></p>
                                    <p><?php echo $experiences->information ?></p>
                                    <hr class="light my-4" />
                                </div><?php } ?>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#formations">Mes formations</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- formation-->
        <section class="page-section" id="formations">
            <div class="container">
                <h2 class="text-center mt-0">Formations</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-8 col-md-6 text-center">
                        <?php
                        //Affichage de la partie formations par une boucle
                            $result_form = $pdo->query("SELECT * FROM formations");
                            while ($formations = $result_form->fetch(PDO::FETCH_OBJ)) {?>
                                <div class="card-body form">
                                    <h5 class="card-title"><?php echo $formations->nom_ecole. "<br"; ?></h5>
                                    <p><?php echo $formations->date_obt ?></p>
                                    <p><?php echo $formations->diplome ?></p>
                                    <hr class="divider my-4" />
                                </div>
                        <?php } ?>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#competences">Mes compétences</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- competences -->
        <section class="page-section bg-primary" id="competences">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Competences</h2>
                        <hr class="divider light my-4" />
                        <?php 
                        //Affichage de la partie competences par une boucle
                        //L'idée aurait été de les trier par catégorie mais pas eu le temps.
                            $result_comp = $pdo->query("SELECT * FROM competences");
                            while ($competences = $result_comp->fetch(PDO::FETCH_OBJ)) {?>
                                <div class="card-body comp">
                                    <p><?php echo $competences->categorie;?></p>
                                    <h5 class="card-title"><?php echo $competences->nom_comp. "<br"; ?></h5>
                                    <p><?php echo $competences->niveau."/10";?></p>
                                    <hr class="light my-4" />
                                </div><?php } ?>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#portfolio">Mon portfolio</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio
        Pas eu le temps de faire cette partie (pas de table dans la BD ni de système d'ajout/modif/suppr pour cette partie)-->

        <section id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <!-- <div class="col-lg-4 col-sm-6">
                    <?php 
                        /*Affichage de la partie portfolio par une boucle
                            $result_comp = $pdo->query("SELECT * FROM portfolio");
                            while ($competences = $result_comp->fetch(PDO::FETCH_OBJ)) {?>
                                <div class="card-body port">
                                    <a class="portfolio-box" href="<?php echo portfolios->lien; ?>">
                                    <img class="img-fluid" src="<?php echo portfolios->lien; ?>" alt="" />
                                    <div class="portfolio-box-caption">
                                    <div class="project-category text-white-50"><?php echo $portfolios->categorie."/10";?></div>
                                    <div class="project-name"><?php echo $portfolios->nom_port. "<br"; ?></div>
                                </div></a>
                                </div>
                                </div><?php } */?> -->
                     <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg"
                            ><img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg"
                            ><img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg"
                            ><img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg"
                            ><img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg"
                            ><img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg"
                            ><img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>
                            </div></a
                        >
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contactez moi!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Si vous souhaitez me contacter pour un entretien choisissez l'un des deux moyens suivant</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>06 11 22 33 44</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="mailto:jeremy.masse@ynov.com">jeremy.masse@ynov.com</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - CV-Massé Jérémy</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
