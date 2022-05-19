<!DOCTYPE HTML>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Ajouter un client</title>
</head>
<body class="p-3 mb-2 bg-dark text-white">
<h2 class="text-center">Ajout d'un client</h2>

<div class="row">
    <!--    Voir tout les client-->
    <form class="form-inline" style="margin-left: 1.5%" method="GET" type="text" action="listeClients.php">
        <button type="submit" name="voir" class="btn btn-primary btn-lg">Voir tout les clients</button>
    </form>
    <!--    Acceuil-->
    <form class="form-inline" style="margin-left: 1%" method="GET" type="text" action="index.html">
        <button type="submit" name="ajouter" class="btn btn-light btn-lg">Acceuil</button>
    </form>
</div>


<form action="ajouterClientConfirmation.php" method=get>

    <div style="padding: 50px" class="text-lg-center">
        <p>Nom :</p>  <input type="text" name="nom" size="25">
        <p>Prénom :</p> <input type="text" name="prenom" size="25"/>
        <p>Adresse :</p> <input type="text" name="adresse" size="30"/> </br>
        <p>Type de client :</p>
        <select name="typedeclient" size="1">
            <?php
            try {
                $connexion = new PDO('mysql:host=localhost;dbname=locauto',
                    'root', '');
                $requete = 'SELECT * FROM type_de_client';
                $resultat = $connexion->query($requete);
                while ($ligne = $resultat->fetch()) {
                    echo "\t\t<option value ='" . $ligne["id_type_de_client"] . "'>"
                        . $ligne["libelle"] . "</option>\n";
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage() . "<br/>";
                die();
            }
            ?>
        </select>

        <p/><input style="margin-top: 50px" type="submit" value="Enregistrer"/>
    </div>
</form>
</div>


</form>
</body>
</html>