<?php
  session_start(); // Pour les massages

  // Contenu du formulaire :
  $mailAdmin =  htmlentities($_POST['email']);
  $date = htmlentities($_POST['date']);
  $nom_jeu = htmlentities($_POST['nom']);
  
  require_once("param.inc.php");
  $mysqli = mysqli_connect($host,$login,$passwd,$dbname);
  if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
}
  /*
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, tp);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }
  */
    $requeteSelect1 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
    $requeteSelect1->bind_param("s", $_SESSION['email']); 
    $requeteSelect1->execute();
    $requeteSelect1->bind_result($idUtilisateur);
    $requeteSelect1->fetch();
    $requeteSelect1->close();
    $requeteSelect2 = $mysqli->prepare("SELECT id_jeu FROM jeu WHERE nom_jeu = ?");
    $requeteSelect2->bind_param("s", $nom_jeu); 
    $requeteSelect2->execute();
    $requeteSelect2->bind_result($idJeu);
    $requeteSelect2->fetch();
    $requeteSelect2->close();
    // Vérifier si l'utilisateur existe dans la table utilisateur
if (
    // Préparer la requête INSERT INTO pour insérer des données dans la table creationjeu
    $requeteInsert1 = $mysqli->prepare("INSERT INTO creationjeu (id_utilJeu, date_Jeu, id_jeu) VALUES (?, ?, ?)")) {
    $requeteInsert1->bind_param("isi", $idUtilisateur, $date, $idJeu); // "i" indique que c'est un entier (integer)
    if($requeteInsert1->execute()) {
        $_SESSION['message'] = "Ajout réussi";
        header('Location: listCreneaux.php');

    } else {
        $_SESSION['message'] =  "Ajout Impossible";
        header('Location: listCreneaux.php');
    }
}



?>