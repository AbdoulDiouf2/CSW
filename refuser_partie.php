<?php
$idCreaJeu = $_GET['id_CreaJeu'];
$idUtil = $_GET['id_util'];

// Connexion :
require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_error . ') '
        . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("UPDATE creneaujeu SET statut = '2' WHERE id_CreaJeu = ? AND id_util = ?")) {

    $stmt->bind_param("ii", $idCreaJeu,$idUtil);
    $stmt->execute();
}

// Vous pouvez ajouter ici d'autres actions si nécessaire

header("location:listCreneaux.php");
?>
