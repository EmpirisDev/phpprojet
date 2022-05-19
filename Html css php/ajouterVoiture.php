<!DOCTYPE HTML>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Ajouter une voiture</title>
</head>
<body class="p-3 mb-2 bg-dark text-white">
<h2 class="text-center">Ajout d'une voiture</h2>

<div class="row">
    <!--    Voir toute les voiture-->
    <form class="form-inline" style="margin-left: 1.5%" method="GET" type="text" action="listeVoiture.php">
        <button type="submit" name="voir" class="btn btn-primary btn-lg">Voir toute les voiture</button>
    </form>
    <!--    Acceuil-->
    <form class="form-inline" style="margin-left: 1%" method="GET" type="text" action="index.html">
        <button type="submit" name="ajouter" class="btn btn-light btn-lg">Acceuil</button>
    </form>
</div>


<form action="ajouterVoitureConfirmation.php" method=get>

    <div style="padding: 50px" class="text-lg-center">
        <p>immatriculation :</p>  <input type="text" name="immatriculation" size="25">
        <p>compteur :</p> <input type="number" name="compteur" size="25"/>
        <p>Type de modele :</p>
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
        </select>

        <p/><input style="margin-top: 50px" type="submit" value="Enregistrer"/>
    </div>
</form>
</div>


</form>
</body>
</html>