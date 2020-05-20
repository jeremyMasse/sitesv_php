<?php
    //Partie sur le sistem de login
    $pdo = new PDO('mysql:host=localhost;dbname=sitecv', 'root', '',
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $result = $pdo->query("SELECT * FROM connexion");
    $admin = $result->fetch(PDO::FETCH_ASSOC);
    if (!empty($_POST)){
        if ($admin["pseudo"] === $_POST["pseudo"] && $admin["mdp"] === $_POST["mdp"]){
            session_start();
            $_SESSION["pseudo"] = $admin["pseudo"];
            $_SESSION["connect"] = TRUE;
        }
    } ?>

<?php
/*INSERT INTO experiences (titre, description, information, date_debut, date_fin)
VALUES ("CMP", "Job d’été", "De la manutention (constructions de cartons, filmer des palettes, utilisation d’un transpalette).", "2018-08-08", "2018-08-13"),
("Société Neilwan – McDonald’s", "CDI", " Services en salles, encaisser, préparation de boissons et de glaces, préparation de commande, prise de commandes au drive.", "2018-10-10", "2018-11-25"),
("Société Hobart - Service informatique", "Stage", "réinitialisation d’ordinateur, déploiement d’ordinateur pour les techniciens d’Hobart, Prise d’appel pour régler les différents soucis que les techniciens peuvent avoir.", "2019-06-17", "2019-07-26"),
("Buffalo Grill", "Job d’été", "Travail en cuisine : Entrées et dessert, plonge", "2019-08-07", "2019-08-20")*/

?>