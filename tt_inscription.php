<?php
session_start(); // Pour les massages

// Contenu du formulaire :
$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);
$role = 2; 

// Option pour bcrypt
$options = [
    'cost' => 12,
];

// Connexion :
require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$existe = 0;
if ($test = $mysqli->prepare("SELECT * FROM utilisateur")) {
    $test->execute();
    $result0 = $test->get_result();
    while ($row0 = $result0->fetch_assoc()) {
        if ($email == $row0['mail_util']) {
            $existe = 1;
        }
    }
    $test->close();
}

if ($existe == 1) {
    $_SESSION['message'] =  "Veuillez saisir une adresse mail différente";
    $existe = 0;
    header('Location: inscription.php');
} else {
    if ($stmt = $mysqli->prepare("INSERT INTO utilisateur(nom_util, prenom_util, mail_util, mdp_util, role_util) VALUES (?, ?, ?, ?, ?)")) {
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt->bind_param("ssssi", $nom, $prenom, $email, $password, $role);

        if ($stmt->execute()) {
            $id_util_select = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ? LIMIT 1");
            $id_util_select->bind_param("s", $email);
            $id_util_select->execute();
            $id_util_select->bind_result($id_utilselect);
            $id_util_select->fetch();
            $id_util_select->close();

            $liste_jeux = $mysqli->prepare("SELECT id_jeu FROM jeu");
            $liste_jeux->execute();
            $result = $liste_jeux->get_result();

            while ($row = $result->fetch_assoc()) {
                $ajout_jeu = $mysqli->prepare("INSERT INTO joueurjeu(id_util, id_jeu) VALUES (?, ?)");
                $ajout_jeu->bind_param("ii", $id_utilselect, $row['id_jeu']);
                $ajout_jeu->execute();
                $ajout_jeu->close();
            }

            $_SESSION['message'] = "Enregistrement réussi";
        } else {
            $_SESSION['message'] =  "Impossible d'enregistrer";
        }
    }
    $existe = 0;
    header('Location: connexion.php');
}
?>
