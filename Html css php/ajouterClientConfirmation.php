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
<?php
// variables passées par le formulair
$nom = $_GET["nom"];
$prenom = $_GET["prenom"];
$adresse = $_GET["adresse"];
$typeDeClient = $_GET["typedeclient"]; ;

try {
    $connexion = new PDO('mysql:host=localhost;dbname=locauto',
        'root', '');
    $requete = 'INSERT INTO client
(nom, prenom, adresse,id_type_de_client) VALUES ("'.$nom.'", "'.$prenom.'", "'.$adresse.'",'.$typeDeClient.')';

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

<p  style="margin-top: 10%" class="text-center"> Le nouveau client <?php
    echo  $nom ;?> a été insere dans la base !</p>
<div style="margin-left: 35%"  class="row">

    <!--    Voir tout les client-->
    <form class="form-inline"  method="GET" type="text" action="listeClients.php">
        <button type="submit" name="voir" class="btn btn-primary btn-lg">Voir tout les clients</button>
    </form>
    </form>
    <!--  Ajouter un client -->
    <form class="form-inline"  style="padding: 5px"" method="GET" type="text" action="ajouterClient.php">
    <button type="submit" name="ajouter" class="btn btn-primary btn-lg">Ajouter un autre client</button>
    </form>
</div>
</body>
</html>

