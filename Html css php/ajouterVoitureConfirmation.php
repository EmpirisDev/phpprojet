<!DOCTYPE HTML>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Ajouter une voiture</title>
</head>
<?php
// variables passées par le formulair
$immatriculation = $_GET["immatriculation"];
$compteur = $_GET["compteur"];
$modele = $_GET["modele"];


try {
    $connexion = new PDO('mysql:host=localhost;dbname=locauto',
        'root', '');
    $requete = 'INSERT INTO voiture
(immatriculation,compteur,id_modele) VALUES ("'.$immatriculation.'", "'.$compteur.'", "'.$modele.'")';

    $resultat = $connexion->exec($requete);
// l'insertion s'est bien passée => retourner l'info à l'user


} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage() . "<br/>";
    die();
}
?>
<body class="bg-dark text-white" >
<!--    Acceuil-->
<form  class="form-inline" style="padding: 2.5%"  method="GET" type="text" action="index.html">
    <button type="submit" name="ajouter" class="btn btn-light btn-lg">Acceuil</button>
</form>

<p  style="margin-top: 10%" class="text-center"> La nouvelle voiture avec l'iammatriculation <?php
    echo  $immatriculation ;?> a été insere dans la base !</p>
<div style="margin-left: 35%"  class="row">

    <!--    Voir tout les client-->
    <form class="form-inline"  method="GET" type="text" action="listeVoiture.php">
        <button type="submit" name="voir" class="btn btn-primary btn-lg">Voire toute les voitures</button>
    </form>
    </form>
    <!--  Ajouter une voiture -->
    <form class="form-inline"  style="padding: 5px" method="GET" type="text" action="ajouterVoiture.php">
    <button type="submit" name="ajouter" class="btn btn-primary btn-lg">Ajouter une autre voiture</button>
    </form>
</div>
</body>
</html>

