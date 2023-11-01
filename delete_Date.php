<?php
$idCreaJeu=$_GET['id_CreaJeu'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, "tp");
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM creationjeu WHERE id_CreaJeu=? limit 1")) 
{
<<<<<<< HEAD

=======
 
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
  $stmt->bind_param("i", $idCreaJeu);
  $stmt->execute();
}


header("location:listCreneaux.php")

?>