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
$nomJeu=$_GET['nomJeu'];
$msg="Vous avez été desinscris de : " .$nomJeu. ".";

if ($stmt = $mysqli->prepare("DELETE FROM creneaujoueur WHERE id_CreaJeu=? AND id_util =? LIMIT 1")) {
    $stmt->bind_param("ii", $idCreaJeu, $idUtil);
    $stmt->execute();
    $stmt->close();  // Fermez le jeu de résultats après l'exécution de la première requête DELETE

    // Exécutez la deuxième requête d'insertion
    $message = $mysqli->prepare("INSERT INTO msgutil (id_util, messages) VALUES(?,?) LIMIT 1");
    $message->bind_param("is", $idUtil, $msg);
    $message->execute();
    $message->close();
}

header("location:liste_inscris_admin.php");
?>
