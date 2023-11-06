<?php
$idCreaJeu=$_GET['id_CreaJeu'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, "tp");
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_error . ') '
            . $mysqli->connect_error);
}

    if ($stmt = $mysqli->prepare("UPDATE creationjeu SET Partie_terminee = '1' WHERE id_CreaJeu=? limit 1")) 
    {

    $stmt->bind_param("i", $idCreaJeu);
    $stmt->execute();
    }




header("location:listCreneaux.php")

?>