<?php
session_start();
$idJeu=$_GET['id_Jeu'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, "tp");
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_error . ') '
            . $mysqli->connect_error);
}
$stmt = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$result2 = $stmt->get_result();
$row2 = $result2->fetch_assoc();




    if ($stmt = $mysqli->prepare("UPDATE joueurjeu SET joueur_aimant = '1' WHERE id_jeu= ? AND id_util=? limit 1")) 
    {

    $stmt->bind_param("ii", $idJeu, $row2['id_util']);
    $stmt->execute();
    }




header("location:liste_jeux_membre.php")

?>