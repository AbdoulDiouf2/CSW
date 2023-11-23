<?php
session_start();
echo '<pre>';
print_r($_POST);
echo '</pre>';

// Récupération des données du formulaire
$date = htmlentities($_POST['date']);
//$nom_jeu = htmlentities($_POST['nom_jeu']);
$nom_jeu = htmlspecialchars($_POST['nom_jeu'], ENT_QUOTES, 'UTF-8');

require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);

if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    header("Location: tt_connexion.php");
    exit();
}

// Sélection de l'id_utilisateur
$requeteSelect1 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
$requeteSelect1->bind_param("s", $_SESSION['email']); 
$requeteSelect1->execute();
$requeteSelect1->bind_result($idUtilisateur);
$requeteSelect1->fetch();
$requeteSelect1->close();

// Sélection de l'id_jeu
$requeteSelect2 = $mysqli->prepare("SELECT id_jeu FROM jeu WHERE nom_jeu = ?");
$requeteSelect2->bind_param("s", $nom_jeu); 
$requeteSelect2->execute();
$requeteSelect2->bind_result($idJeu);
$requeteSelect2->fetch();
$requeteSelect2->close();




// Insertion dans la table creationjeu
if ($requeteInsert1 = $mysqli->prepare("INSERT INTO creationjeu (id_utilJeu, date_Jeu, id_jeu) VALUES (?, ?, ?)")) {
    $requeteInsert1->bind_param("isi", $idUtilisateur, $date, $nom_jeu);
    if ($requeteInsert1->execute()) {
        $_SESSION['message'] = "Ajout réussi";
        header('Location: page_ajout_date.php');
    } else {
        $_SESSION['message'] = "Ajout Impossible";
        header('Location: page_ajout_date.php');
    }
    $requeteInsert1->close();
}
?>
