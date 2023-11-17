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
 
  
  // Connexion :
  require_once("param.inc.php");
  $mysqli = mysqli_connect($host,$login,$passwd,$dbname);
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }
  $existe = 0;
  if($test = $mysqli->prepare("SELECT * FROM utilisateur"))
  {
  $test->execute();
  $result0 = $test->get_result();
  while($row0 = $result0->fetch_assoc())
  {
    if($email==$row0['mail_util'])
    {
      $existe=1;
    }
    else
    {
      
    }
  }
}
  if($existe==1)
  
  {
    $_SESSION['message'] =  "Veuillez saisir une adresse mail différente";
    $existe=0;
    header('Location: inscription.php');
  
  
}
else
{
  if ($stmt = $mysqli->prepare("INSERT INTO utilisateur(nom_util, prenom_util, mail_util, mdp_util, role_util) VALUES (?, ?, ?, ?, ?)")) 
  {
    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $password, $role);
    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    if($stmt->execute()) {
        $_SESSION['message'] = "Enregistrement réussi";

    } else {
        $_SESSION['message'] =  "Impossible d'enregistrer";
    }
  }
  $existe=0;
  header('Location: index.php');
}
  // Redirection vers la page d'accueil par exemple :
  


?>