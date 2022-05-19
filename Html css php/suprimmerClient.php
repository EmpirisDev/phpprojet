<?php
$clientSuprimmer =  $_GET["id_client_suprimmer"];
$connexion = new PDO('mysql:host=localhost;dbname=locauto',
    'root', '');
$requete = $requete = 'SELECT nom,prenom,id_client FROM client WHERE id_client ='.$clientSuprimmer.'; DELETE FROM client WHERE id_client ='.$clientSuprimmer;
$resultat = $connexion->query($requete);


 ?>

<!DOCTYPE HTML>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Ajouter un client</title>
</head>
<body class="bg-dark text-white" >
<!--    Acceuil-->
<form  class="form-inline" style="padding: 2.5%"  method="GET" type="text" action="index.html">
    <button type="submit" name="ajouter" class="btn btn-light btn-lg">Acceuil</button>
</form>

<p  style="margin-top: 10%" class="text-center"> Le client <?php
    $ligne = $resultat->fetch();

        echo "\t<tr>\n";
        echo "\t\t<td>" . $ligne["nom"] . "</td>\n";
        echo "\t\t<td>" . $ligne["prenom"] . "</td>\n";
        echo "Avec l'ID ".$ligne["id_client"]. "</td>\n";
        echo "\t</tr>\n";


    ?> a ete suprimmé!</p>
<div style="margin-left:43.5%">

    <!--    Voir tout les client-->
    <form style="margin-top: 50px" class="form-inline"  method="GET" type="text" action="listeClients.php">
        <button type="submit" name="voir" class="btn btn-primary btn-lg">Voir tout les clients</button>
    </form>
</div>
</body>
</html>