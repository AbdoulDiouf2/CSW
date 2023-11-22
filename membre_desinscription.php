<?php
session_start();
// Connexion :
require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_error . ') '
            . $mysqli->connect_error);
}

$idCreaJeu=$_GET['id_CreaJeu'];
$idUtil=$_GET['id_util'];

    if ($stmt = $mysqli->prepare("DELETE FROM creneaujoueur WHERE id_CreaJeu=? AND id_util =? limit 1")) 
    {

    $stmt->bind_param("ii", $idCreaJeu, $idUtil);
    $stmt->execute();
    }




header("location:liste_inscris_admin.php")

?>