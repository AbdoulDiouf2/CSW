<?php
  session_start(); // Pour les massages
  if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
}

  // Contenu du formulaire :
  $nom =  htmlentities($_POST['nom']);
 // $photo = htmlentities($_POST['photo']);
  $photo=$_FILES['userfile']['name'];//recupérer le nom de fichier
  $fichierTemp=$_FILES['userfile']['tmp_name'];//recupérer le nom du fichier temporaire téléchargé sur le serveur.
  move_uploaded_file($fichierTemp,'./images/'.$photo);//transférer le fichier dans le dossier image du projet
  if (!$fichierTemp) {
    $_SESSION['message'] = "Échec du téléchargement du fichier.";
    header('Location: page_ajout_jeu.php'); // Redirigez vers la page d'ajout
    exit();
}
  $description =  htmlentities($_POST['description']);
  $categorie = htmlentities($_POST['categorie']);
  $regle = htmlentities($_POST['regle']);
  require_once("param.inc.php");
  $mysqli = mysqli_connect("localhost","root",$passwd,"tp");
  
  // Attention, ici on ne vérifie pas si l'utilisateur existe déjà
  if ($stmt = $mysqli->prepare("INSERT INTO jeu(nom_jeu, photo_jeu, desc_jeu, categorie_jeu, regle_jeu) VALUES (?, ?, ?, ?, ?)")) {
    $stmt->bind_param("sssss", $nom, $photo, $description, $categorie, $regle);
    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    if($stmt->execute()) {
        header('Location: page_ajout_jeu.php');
//        $_SESSION['message'] = "Ajout réussi";

    } else {
        $_SESSION['message'] =  "Impossible d'enregistrer" . $stmt->error;
    }
  }
  // Redirection vers la page d'accueil par exemple :


?>