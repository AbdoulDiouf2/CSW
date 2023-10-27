<?php
  session_start(); // Pour les massages

  // Contenu du formulaire :
  $nom =  htmlentities($_POST['nom']);
  $photo = htmlentities($_POST['photo']);
  $description =  htmlentities($_POST['description']);
  $categorie = htmlentities($_POST['categorie']);
  $regle = htmlentities($_POST['regle']);
  
  $mysqli = mysqli_connect("localhost","root","","tp");
  /*
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, tp);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }
  */

  // Attention, ici on ne vérifie pas si l'utilisateur existe déjà
  if ($stmt = $mysqli->prepare("INSERT INTO jeu(nom_jeu, photo_jeu, desc_jeu, categorie_jeu, regle_jeu) VALUES (?, ?, ?, ?, ?)")) {
    $stmt->bind_param("sssss", $nom, $photo, $description, $categorie, $regle);
    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    if($stmt->execute()) {
        $_SESSION['message'] = "Enregistrement réussi";

    } else {
        $_SESSION['message'] =  "Impossible d'enregistrer";
    }
  }
  // Redirection vers la page d'accueil par exemple :
  header('Location: page_ajout_jeu.php');


?>