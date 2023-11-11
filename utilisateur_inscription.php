<?php
session_start();
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
$id_util = $stmt->get_result(); 
$row = $id_util->fetch_assoc();
$idCreaJeu=$_GET['id_CreaJeu'];


    if ($stmt = $mysqli->prepare("INSERT INTO creneaujoueur (id_CreaJeu, id_util, joueur_inscris) VALUES (?, ?, 1) ")) 
    {

    $stmt->bind_param("ii", $idCreaJeu, $id_util);
    $stmt->execute();
    }




header("location:comming_parts.php")

?>