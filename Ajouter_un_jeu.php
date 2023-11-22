<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
  header("Location: tt_connexion.php");
  exit();
}

$nom =  htmlentities($_POST['nom']);
$photo=$_FILES['userfile']['name'];
$fichierTemp=$_FILES['userfile']['tmp_name'];

// cette partie me permet de vérifier que le fichier est une image
$imageFileType = strtolower(pathinfo($photo,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
  $_SESSION['message'] = "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
  header('Location: page_ajout_jeu.php');
  exit();
}

// cette partie me permet de vérifier que le fichier ne dépasse pas une certaine taille
if ($_FILES["userfile"]["size"] > 100000000) {
  $_SESSION['message'] = "Désolé, votre fichier est trop volumineux.";
  header('Location: page_ajout_jeu.php');
  exit();
}

move_uploaded_file($fichierTemp,'./images/'.$photo);

$description =  htmlentities($_POST['description']);
$categorie = htmlentities($_POST['categorie']);

$regle=$_FILES['userpdf']['name'];
$fichierTemp2=$_FILES['userpdf']['tmp_name'];

// cette partie me permet de vérifier que le fichier est un PDF
$pdfFileType = strtolower(pathinfo($regle,PATHINFO_EXTENSION));
if($pdfFileType != "pdf") {
  $_SESSION['message'] = "Désolé, seuls les fichiers PDF sont autorisés.";
  header('Location: page_ajout_jeu.php'); 
  exit();
}

// cette partie me permet de vérifier que le fichier ne dépasse pas une certaine taille
if ($_FILES["userpdf"]["size"] > 100000000) {
  $_SESSION['message'] = "Désolé, votre fichier est trop volumineux.";
  header('Location: page_ajout_jeu.php');
  exit();
}

move_uploaded_file($fichierTemp2,'./regle_de_jeu/'.$regle);

require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname); 
if ($stmt = $mysqli->prepare("INSERT INTO jeu(nom_jeu, photo_jeu, desc_jeu, categorie_jeu, regle_jeu) VALUES (?, ?, ?, ?, ?)")) {
  $stmt->bind_param("sssss", $nom, $photo, $description, $categorie, $regle);
  if($stmt->execute()) {
    $_SESSION['message'] = "Ajout réussi";
    header('Location: page_ajout_jeu.php');
  } else {
    $_SESSION['message'] =  "Impossible d'enregistrer" . $stmt->error;
    header('Location: page_ajout_jeu.php');
  }
}
?>
