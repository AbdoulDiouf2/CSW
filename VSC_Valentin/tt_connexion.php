<?php
  session_start(); // Pour les massages
  
 
  
  $email =  htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  $mysqli = mysqli_connect("localhost","root","","tp");
  /*
  // Connexion :
  require_once("param.inc.php");
  $mysqli = new mysqli($host, $login, $passwd, "tp");
  if ($mysqli->connect_error) {
      die('Erreur de connexion (' . $mysqli->connect_errno . ') '
              . $mysqli->connect_error);
  }
  */

  
  
  if ($stmt = $mysqli->prepare("SELECT mdp_util, role_util FROM utilisateur WHERE mail_util=? limit 1")) 
  {
   
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();   

    if($result->num_rows > 0) 
    {     
        $row = $result->fetch_assoc(); 
            if (password_verify($password,$row["mdp_util"])) 
            {
                  // Redirection vers la page admin.php ou autres pages en fonction du role (tuteur,admin, etc.);

                //$_SESSION['message'] = "Authentification réussi pour un role inconnu.";
                if($row["role_util"]==1){
                  
                  $_SESSION['message'] = "Authentification réussi pour un admin.";

                  header('Location: admin.php');
                }
                if($row["role_util"]==2)
                {
                $_SESSION['message'] = "Authentification réussi pour un tuteur.";
                
                header('Location: index.php');
              }          
            
              }else { 
                // Redirection vers la page d'authetification connexion.php
              $_SESSION['message'] = "Password Incorrect";
                header('Location: connexion.php');
                
              }    
        
    }else{
        
      $_SESSION['message'] = "Identifiant Innexistant";
         header('Location: connexion.php');
        }
    }

?>
