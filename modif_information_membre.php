<?php
  session_start(); // Pour les massages
  if (!isset($_SESSION['email']) || !isset($_SESSION['isMembre']) || $_SESSION['isMembre'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
}

if (isset($_POST['modifier'])) {
    $nom =  htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $email =  htmlentities($_POST['email']);
    $photo = $_FILES['userfile']['name'];
    $fichierTemp = $_FILES['userfile']['tmp_name'];
    
    if (empty($photo)) {
        $photo = "user.jpeg";
    }

    if (empty($nom)) {
        $_SESSION['message'] = "Le champ 'Nom' est obligatoire pour la modification.";
        header('Location: page_modif_information_membre.php?modif=' . $nom);
        exit();
    }
    if (empty($prenom)) {
        $_SESSION['message'] = "Le champ 'Prenom' est obligatoire pour la modification.";
        header('Location: page_modif_information_membre.php?modif=' . $prenom);
        exit();
    }

    require_once("param.inc.php");
    $mysqli = mysqli_connect($host,$login,$passwd,$dbname);

    if ($stmt = $mysqli->prepare("UPDATE utilisateur SET photo = ?, nom_util = ?, prenom_util = ?, mail_util = ? WHERE mail_util = ?")) {
        $stmt->bind_param("sssss", $photo, $nom, $prenom, $email, $_SESSION['email']);
        move_uploaded_file($fichierTemp, './user_photo/' . $photo);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Modification réussie";
            header('Location: page_Profil_Membre.php');            
        } else {
            $_SESSION['message'] = "Impossible de modifier vos informations : " . $stmt->error;
            header('Location: page_Profil_Membre.php');        
        }
    }
    exit();
} else {

    // Redirection vers la page d'accueil :
    $_SESSION['message'] =  "Impossible d'enregistrer" . $stmt->error;
    header('Location: page_modif_information_membre.php?modif=' . $nom);
} 
  


?>