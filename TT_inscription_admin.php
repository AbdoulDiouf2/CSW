<?php
  session_start(); // Pour les massages

  // Contenu du formulaire :
  $nom =  htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);
  $email =  htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  $role = 1; // 1 pour admin, 2 pour responsable PING, 3 pour eleve par exemple :o)

  
  $options = [
        'cost' => 12,
  ];
  require_once("param.inc.php");
  $mysqli = mysqli_connect($host, $login, $passwd, $dbname);
  
  if ($stmt = $mysqli->prepare("INSERT INTO utilisateur(nom_util, prenom_util, mail_util, mdp_util, role_util) VALUES (?, ?, ?, ?, ?)")) {
    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $password, $role);
    if($stmt->execute()) {
        $_SESSION['message'] = "Enregistrement réussi";
        header('Location: page_ajout_admin.php');        
    } else {
        $_SESSION['message'] =  "Impossible d'enregistrer";
        header('Location: page_ajout_admin.php');
      }
  }




?>