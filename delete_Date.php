<?php
$idCreaJeu=$_GET['id_CreaJeu'];
// Connexion :
require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM creationjeu WHERE id_CreaJeu=? limit 1")) 
{

  $stmt->bind_param("i", $idCreaJeu);
  $stmt->execute();
}


header("location: page_ProfilAdmin.php")

?>