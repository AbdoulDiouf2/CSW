<?php
$jeu=$_GET['jeu'];
// Connexion :
require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM jeu WHERE nom_jeu=? limit 1")) 
{
 
  $stmt->bind_param("s", $jeu);
  if ($stmt->execute()) {
    header("location:Gestion_des_jeux.php");
    $_SESSION['message'] = "Suppression réussie";
  } else {
    $_SESSION['message'] = "Impossible de supprimer : " . $stmt->error;
  }
}

?>