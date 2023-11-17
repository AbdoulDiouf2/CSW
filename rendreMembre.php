<?php
session_start();
$email=$_GET['email'];
// Connexion :
require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_error . ') '
            . $mysqli->connect_error);
}
if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
}
$stmt = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$result2 = $stmt->get_result();
$row2 = $result2->fetch_assoc();




    if ($stmt = $mysqli->prepare("UPDATE utilisateur SET role_util = '2' WHERE mail_util = ? limit 1")) 
    {

    $stmt->bind_param("s", $email);
    $stmt->execute();
    }
/*
    else 
    {
        $stmt1 = $mysqli->prepare("INSERT INTO joueurjeu (id_util, id_jeu, joueur_aimant) VALUES (?,?,1)");
        $stmt1->bind_param("ii", $row2['id_util'], $idJeu);
        $stmt1->execute();
    }
*/



header("location:list.php")

?>