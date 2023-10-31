<?php
  session_start(); // Pour les massages

  // Contenu du formulaire :
  $nom =  htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);
  $email =  htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  $role = 2; // 1 pour admin, 2 pour responsable PING, 3 pour eleve par exemple :o)

  // Option pour bcrypt
  $options = [
        'cost' => 12,
  ];
<<<<<<< HEAD
  require_once("param.inc.php");
  $mysqli = mysqli_connect("localhost","root",$passwd,"tp");
  /*
=======
  $mysqli = mysqli_connect("localhost","root","root","tp");
  
>>>>>>> cceddc702de5b9405d2452e9a740856195667279
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, "tp");
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }
  */

  // Attention, ici on ne vérifie pas si l'utilisateur existe déjà
  if ($stmt = $mysqli->prepare("INSERT INTO utilisateur(nom_util, prenom_util, mail_util, mdp_util, role_util) VALUES (?, ?, ?, ?, ?)")) {
    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $password, $role);
    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    if($stmt->execute()) {
        $_SESSION['message'] = "Enregistrement réussi";

    } else {
        $_SESSION['message'] =  "Impossible d'enregistrer";
    }
  }
  // Redirection vers la page d'accueil par exemple :
  header('Location: index.php');


?>