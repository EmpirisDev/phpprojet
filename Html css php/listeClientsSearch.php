<!DOCTYPE HTML>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Liste des employes</title>
</head>
<body class="p-3 mb-2 bg-dark text-white">
<div class="container">

    <div class="text-center">
        <!--    Titre-->
        <h1 style="margin-bottom: 30px">
            Données
        </h1>
    </div>


    <div class="row ">
        <!--        voir tout les clients -->
        <form class="form-inline" style="margin-left: 1.5%" method="GET" type="text" action="listeClients.php">
            <button type="submit" name="voir" class="btn btn-primary btn-lg">Voir tout les clients</button>
        </form>
        <!--  Ajouter un client -->
        <form class="form-inline" style="padding: 5px" method="GET" type="text" action="ajouterClient.php">
            <button type="submit" name="ajouter" class="btn btn-primary btn-lg">Ajouter un client</button>
        </form>

        <!--  suprimer un client-->
        <form class="form-inline" style="padding: 5px" method="GET" type="text" action="suprimmerClient.php">
            <button type="submit" name="suprimmer" class="btn btn-warning btn-lg">Suprimmer un client</button>
            <input style="margin-left: 5px" type="text" name="id_client_suprimmer" class="form-control"
                   placeholder="<-- Numéro de client">
        </form>
        <!--        Acceuil-->
        <form class="form-inline" style="margin-left: 10%" method="GET" type="text" action="index.html">
            <button type="submit" name="ajouter" class="btn btn-light btn-lg">Acceuil</button>
        </form>

    </div>
    <!--  recherche un client-->
    <div class="d-flex align-items-center" style="height: 100px;">
        <!--Recherche id-->
        <form class="form-inline" style="padding: 50px" method="GET" type="text" action="listeClientsSearch.php">
            <input type="text" name="id_client" class="form-control" placeholder="Numéro de client">
            <button type="submit" name="recherche" class="btn btn-primary">Search</button>
        </form>
        <!--Recherche nom -->
        <form class="form-inline" method="GET" type="text" action="listeClientsSearch.php">
            <input type="text" name="nom" class="form-control" placeholder="Nom">
            <button type="submit" name="recherche" class="btn btn-primary">Search</button>
        </form>
        <!--Recherche nom-->
        <form class="form-inline" style="padding: 50px" method="GET" type="text" action="listeClientsSearch.php">
            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
            <button type="submit" name="recherche" class="btn btn-primary">Search</button>
        </form>


    </div>

    <!--  recherche un client -->

    <!--  <div class="d-flex align-items-center" style="height: 100px;">-->
    <!--&lt;!&ndash;    nom&ndash;&gt;-->
    <!--    <div class="input-group">-->
    <!--      <input type="search" class="form-control rounded" placeholder="Nom" aria-label="Search" aria-describedby="search-addon" />-->
    <!--    </div>-->
    <!--&lt;!&ndash;    prénom&ndash;&gt;-->
    <!--    <div class="input-group">-->
    <!--      <input type="search" class="form-control rounded" placeholder="Prénom" aria-label="Search" aria-describedby="search-addon" />-->
    <!--      <button  type="button" class="btn btn-outline-primary">search</button>-->
    <!--    </div>-->
    <!--  </div>-->

    <!--  Tableau -->

    <?php


    //    vérifie ma variable
    //    recherche nom
    if (isset($_GET["nom"])) {
        $nom = $_GET["nom"];

        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
            'root', '');
        $requete = $requete = 'SELECT nom,id_client,prenom,adresse, id_type_de_client,libelle
from client join type_de_client using (id_type_de_client) where nom ="' . $nom . '"';

        #Créer une liste grace à la méthode query
        $resultat = $connexion->query($requete);


        try {
            echo "<table class='table table-dark'>\n";
            echo "<tr><th>Numéro de client</th>
<th>Nom</th>
<th>Prénom</th>
<th>Adresse</th>
<th>Type de client</th>
   
</tr>";
#Fetch renvoie la prochaine ligne de resultat quand elle est null il s'arrête

            while ($ligne = $resultat->fetch()) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $ligne["id_client"] . "</td>\n";
                echo "\t\t<td>" . $ligne["nom"] . "</td>\n";
                echo "\t\t<td>" . $ligne["prenom"] . "</td>\n";
                echo "\t\t<td>" . $ligne["adresse"] . "</td>\n";
                echo "\t\t<td>" . $ligne["libelle"] . "</td>\n";

                echo "\t</tr>\n";
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
//recherche prenom
    }
    if (isset($_GET["prenom"])) {
        $prenom = $_GET["prenom"];

        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
            'root', '');
        $requete = $requete = 'SELECT nom,id_client,prenom,adresse, id_type_de_client,libelle
from client join type_de_client using (id_type_de_client) where prenom ="' . $prenom . '"';

        #Créer une liste grace à la méthode query
        $resultat = $connexion->query($requete);


        try {
            echo "<table class='table table-dark'>\n";
            echo "<tr><th>Numéro de client</th>
<th>Nom</th>
<th>Prénom</th>
<th>Adresse</th>
<th>Type de client</th>
   
</tr>";
#Fetch renvoie la prochaine ligne de resultat quand elle est null il s'arrête

            while ($ligne = $resultat->fetch()) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $ligne["id_client"] . "</td>\n";
                echo "\t\t<td>" . $ligne["nom"] . "</td>\n";
                echo "\t\t<td>" . $ligne["prenom"] . "</td>\n";
                echo "\t\t<td>" . $ligne["adresse"] . "</td>\n";
                echo "\t\t<td>" . $ligne["libelle"] . "</td>\n";

                echo "\t</tr>\n";
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }

    }
    //    recherche id
    if (isset($_GET["id_client"])) {
        $id_client = $_GET["id_client"];

        $connexion = new PDO('mysql:host=localhost;dbname=locauto',
            'root', '');
        $requete = $requete = 'SELECT nom,id_client,prenom,adresse, id_type_de_client,libelle
from client join type_de_client using (id_type_de_client) where id_client ="' . $id_client . '"';

        #Créer une liste grace à la méthode query
        $resultat = $connexion->query($requete);


        try {
            echo "<table class='table table-dark'>\n";
            echo "<tr><th>Numéro de client</th>
<th>Nom</th>
<th>Prénom</th>
<th>Adresse</th>
<th>Type de client</th>
   
</tr>";
#Fetch renvoie la prochaine ligne de resultat quand elle est null il s'arrête

            while ($ligne = $resultat->fetch()) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $ligne["id_client"] . "</td>\n";
                echo "\t\t<td>" . $ligne["nom"] . "</td>\n";
                echo "\t\t<td>" . $ligne["prenom"] . "</td>\n";
                echo "\t\t<td>" . $ligne["adresse"] . "</td>\n";
                echo "\t\t<td>" . $ligne["libelle"] . "</td>\n";

                echo "\t</tr>\n";
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }

    }
    ?>

</body>
</html>