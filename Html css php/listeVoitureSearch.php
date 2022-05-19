<!DOCTYPE HTML>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Liste des véhicules</title>
</head>
<body class="p-3 mb-2 bg-dark text-white">
<div class="container">

    <div class="text-center">
        <!--    Titre-->
        <h1 style="margin-bottom: 30px">
            Gestion
        </h1>
    </div>
    <!--Ajout ou suprimmer-->
    <div class="row">
        <!--        voir tout les clients -->
        <form class="form-inline" style="margin-left: 1.5%" method="GET" type="text" action="listeVoiture.php">
            <button type="submit" name="voir" class="btn btn-primary btn-lg">Voir toute les voitures</button>
        </form>
        <!--  Ajouter une voiture-->
        <form class="form-inline" style="margin-left: 1.5%" method="GET" type="text" action="ajouterVoiture.php">
            <button type="submit" name="ajouter" class="btn btn-primary btn-lg">Ajouter une voiture</button>
        </form>

        <!--  suprimer une voiture-->
        <form class="form-inline" style="padding: 5px" method="GET" type="text" action="suprimmerVoiture.php">
            <button type="submit" name="suprimmer" class="btn btn-warning btn-lg">Suprimmer une voiture</button>
            <input style="margin-left: 5px" type="text" name="immatriculationsuprimmer" class="form-control"
                   placeholder="<-- Immatriculation">
        </form>
        <!--        Acceuil-->
        <form class="form-inline" style="margin-left: 9%" method="GET" type="text" action="index.html">
            <button type="submit" name="ajouter" class="btn btn-light btn-lg">Acceuil</button>
        </form>


    </div>
    <!--  recherche une voiture-->
    <div class="row">
        <div class="d-flex align-items-center" style="height: 100px;">

            <!--Recherche Modele -->
            <form action="listeVoitureSearch.php" class="row">
                <p style="margin-top: 15px">Modele :</p>
                <select name="modele" size="1">
                    <?php
                    try {
                        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
                            'root', '');
                        $requete = 'SELECT * FROM modele';
                        $resultat = $connexion->query($requete);
                        while ($ligne = $resultat->fetch()) {
                            echo "\t\t<option value ='" . $ligne["id_modele"] . "'>"
                                . $ligne["libelle"] . "</option>\n";
                        }
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage() . "<br/>";
                        die();
                    }

                    ?>
                    <input
                    <button type="submit" name="recherche" class="btn btn-primary">
            </form>


            </select>

            <!--Recherche Catégorie-->
            <form action="listeVoitureSearch.php" class="row">
                <p style="margin-top: 15px;margin-left: 50px">catégorie :</p>
                <select name="categorie" size="1">
                    <?php
                    try {
                        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
                            'root', '');
                        $requete = 'SELECT * FROM categorie';
                        $resultat = $connexion->query($requete);
                        while ($ligne = $resultat->fetch()) {
                            echo "\t\t<option value ='" . $ligne["id_categorie"] . "'>"
                                . $ligne["libelle"] . "</option>\n";
                        }
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage() . "<br/>";
                        die();
                    }

                    ?>
                    <input
                    <button type="submit" name="recherche" class="btn btn-primary">
            </form>
            <!--Recherche immatriculation-->
            <form class="form-inline" style="padding: 50px" method="GET" type="text" action="listeVoitureSearch.php">
                <input type="text" name="immatriculation" class="form-control" placeholder="Immatriculation">
                <button type="submit" name="recherche" class="btn btn-primary">Search</button>
            </form>


        </div>
    </div>

    <?php
    //    recherche modele
    if (isset($_GET["modele"])) {
        $modele = $_GET["modele"];

        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
            'root', '');
        $requete = $requete = 'SELECT id_voiture,immatriculation,compteur,id_modele,modele.libelle as libellemodele,id_categorie,image,categorie.libelle,prix
FROM voiture join modele USING(id_modele) join categorie using (id_categorie) where id_modele =' . $modele;

#Créer une liste grace à la méthode query
        $resultat = $connexion->query($requete);


        try {
            echo "<table class='table table-dark'>\n";
            echo "<tr>
<th>Modele</th>
<th>Catégorie</th>  
<th>Prix(€)</th>   
<th>Immatriculation</th>
<th>compteur</th>
<th>Apparence</th>
</tr>";
#Fetch renvoie la prochaine ligne de resultat quand elle est null il s'arrête

            while ($ligne = $resultat->fetch()) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $ligne["libellemodele"] . "</td>\n";
                echo "\t\t<td>" . $ligne["libelle"] . "</td>\n";
                echo "\t\t<td>" . $ligne["prix"] . "</td>\n";
                echo "\t\t<td>" . $ligne["immatriculation"] . "</td>\n";
                echo "\t\t<td>" . $ligne["compteur"] . "</td>\n";
                echo "\t\t<td> <img src=images/" . $ligne["image"] . "></td>\n";


                echo "\t</tr>\n";
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
//recherche catégorie
    }
    if (isset($_GET["categorie"])) {
        $categorie = $_GET["categorie"];


        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
            'root', '');
        $requete = $requete = 'SELECT id_voiture,prix,immatriculation,compteur,id_modele,modele.libelle as libellemodele,id_categorie,image,categorie.libelle 
FROM voiture join modele USING(id_modele) join categorie using (id_categorie) where id_categorie ="' . $categorie . '"';

#Créer une liste grace à la méthode query
        $resultat = $connexion->query($requete);


        try {
            echo "<table class='table table-dark'>\n";
            echo "<tr>
<th>Modele</th>
<th>Catégorie</th>  
<th>Prix(€)</th>   
<th>Immatriculation</th>
<th>compteur</th>
<th>Apparence</th>
</tr>";
#Fetch renvoie la prochaine ligne de resultat quand elle est null il s'arrête

            while ($ligne = $resultat->fetch()) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $ligne["libellemodele"] . "</td>\n";
                echo "\t\t<td>" . $ligne["libelle"] . "</td>\n";
                echo "\t\t<td>" . $ligne["prix"] . "</td>\n";
                echo "\t\t<td>" . $ligne["immatriculation"] . "</td>\n";
                echo "\t\t<td>" . $ligne["compteur"] . "</td>\n";
                echo "\t\t<td> <img src=images/" . $ligne["image"] . "></td>\n";


                echo "\t</tr>\n";
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
//Recherche immatriculation
    }
    if (isset($_GET["immatriculation"])) {
        $immatriculation = $_GET["immatriculation"];
        echo $immatriculation;

        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
            'root', '');
        $requete = $requete = 'SELECT id_voiture,immatriculation,compteur,id_modele,modele.libelle as libellemodele,id_categorie,image,categorie.libelle,prix
FROM voiture join modele USING(id_modele) join categorie using (id_categorie) where immatriculation ="' . $immatriculation . '"';

#Créer une liste grace à la méthode query
        $resultat = $connexion->query($requete);


        try {
            echo "<table class='table table-dark'>\n";
            echo "<tr>
<th>Modele</th>
<th>Catégorie</th>  
<th>Prix(€)</th>   
<th>Immatriculation</th>
<th>compteur</th>
<th>Apparence</th>
</tr>";
#Fetch renvoie la prochaine ligne de resultat quand elle est null il s'arrête

            while ($ligne = $resultat->fetch()) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $ligne["libellemodele"] . "</td>\n";
                echo "\t\t<td>" . $ligne["libelle"] . "</td>\n";
                echo "\t\t<td>" . $ligne["prix"] . "</td>\n";
                echo "\t\t<td>" . $ligne["immatriculation"] . "</td>\n";
                echo "\t\t<td>" . $ligne["compteur"] . "</td>\n";
                echo "\t\t<td> <img src=images/" . $ligne["image"] . "></td>\n";


                echo "\t</tr>\n";
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }

    }
    ?>
