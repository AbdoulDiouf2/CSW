<?php
  session_start(); // Pour les massages
  
 
  $_SESSION['email'] = htmlentities($_POST['email']);
  
<<<<<<< HEAD
  $_SESSION['email'] = htmlentities($_POST['email']);
=======
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
  $password = htmlentities($_POST['password']);
  require_once("param.inc.php");
  $mysqli = mysqli_connect("localhost","root",$passwd,"tp");
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
   
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();   

    if($result->num_rows > 0) 
    {     
        $row = $result->fetch_assoc(); 
            if (password_verify($password,$row["mdp_util"])) 
            {
                  // Redirection vers la page admin.php ou autres pages en fonction du role (tuteur,admin, etc.);
<<<<<<< HEAD
                //$_SESSION['PROFILE']=$row;
=======

>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
                //$_SESSION['message'] = "Authentification réussi pour un role inconnu.";
                if($row["role_util"]==1){
                  $_SESSION['isAdmin'] = true;
                  $_SESSION['message'] = "Authentification réussi pour un admin.";

                  header('Location: admin.php');
                }
                if($row["role_util"]==2)
                {
<<<<<<< HEAD
                  $_SESSION['isAdmin'] = false;
                  $_SESSION['message'] = "Authentification réussi pour un membre.";
=======
                $_SESSION['isAdmin'] = false;
                $_SESSION['message'] = "Authentification réussi pour un membre.";
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
                
                header('Location: index.php');
              }          
            
              }else { 
                // Redirection vers la page d'authetification connexion.php
                $_SESSION['isAdmin'] = false;
<<<<<<< HEAD
                $_SESSION['message'] = "Username or Password Incorrect";
=======
                $_SESSION['message'] = "Password Incorrect";
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
                header('Location: connexion.php');
                
              }    
        
    }else{
        
      $_SESSION['message'] = "Identifiant Innexistant";
         header('Location: connexion.php');
        }
    }

?>
