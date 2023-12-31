<?php
  session_start(); // Pour les massages
  if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
}

if (isset($_POST['modifier'])) {
    $nom = htmlentities($_POST['nom']);
    $photo = $_FILES['userfile']['name'];
    $fichierTemp = $_FILES['userfile']['tmp_name'];
    $description = htmlentities($_POST['description']);
    $categorie = htmlentities($_POST['categorie']);
    
    
    $regle=$_FILES['userpdf']['name'];//recupérer le nom de fichier
    $fichierTemp2=$_FILES['userpdf']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.

    if (empty($nom)) {
        $_SESSION['message'] = "Le champ 'Nom du jeu' est obligatoire pour la modification.";
        header('Location: page_modif_jeu.php?modif=' . $nom);
        exit();
    }

    require_once("param.inc.php");
    $mysqli = mysqli_connect($host,$login,$passwd,$dbname);

    if ($stmt = $mysqli->prepare("UPDATE jeu SET photo_jeu = ?, desc_jeu = ?, categorie_jeu = ?, regle_jeu = ? WHERE nom_jeu = ?")) {
        $stmt->bind_param("sssss", $photo, $description, $categorie, $regle, $nom);
        move_uploaded_file($fichierTemp, './images/' . $photo);
        move_uploaded_file($fichierTemp2,'./regle_de_jeu/'.$regle);//transférer le fichier dans le dossier regle de jeu du projet
        if ($stmt->execute()) {
            $_SESSION['message'] = "Modification réussie";
        } else {
            $_SESSION['message'] = "Impossible de modifier le jeu : " . $stmt->error;
        }
    }

    header('Location: Gestion_des_jeux.php');
    exit();
} else {

    // Redirection vers la page d'accueil :
    header('Location: page_modif_jeu.php?modif=' . $nom);
    $_SESSION['message'] =  "Impossible d'enregistrer" . $stmt->error;
} 
  


?>