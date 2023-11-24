<?php
$id_msg=$_GET['id_msg'];
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM msgutil WHERE id_msg=? limit 1")) 
{
 
  $stmt->bind_param("i", $id_msg);
  if ($stmt->execute()) {
    header("location:page_mesages_Membre.php");
    $_SESSION['message'] = "Suppression réussie";
  } else {
    $_SESSION['message'] = "Impossible de supprimer : " . $stmt->error;
  }
}


header("location:page_messages_Membre.php")

?>