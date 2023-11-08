<?php
$email=$_GET['email'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM utilisateur WHERE mail_util=? limit 1")) 
{
 
  $stmt->bind_param("s", $email);
  if ($stmt->execute()) {
    header("location:list.php");
    $_SESSION['message'] = "Suppression réussie";
  } else {
    $_SESSION['message'] = "Impossible de supprimer : " . $stmt->error;
  }
}


header("location:list.php")

?>