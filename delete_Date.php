<?php
$idCreaJeu = $_GET['id_CreaJeu'];

// Connexion :
require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ($stmt = $mysqli->prepare("DELETE FROM creationjeu WHERE id_CreaJeu=? LIMIT 1")) {
    $stmt->bind_param("i", $idCreaJeu);
    

    $stmt2 = $mysqli->prepare("SELECT * FROM creationjeu WHERE id_CreaJeu = ? ");
    $stmt2->bind_param("i", $idCreaJeu);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($row2 = $result2->fetch_assoc()) {
        $stmt3 = $mysqli->prepare("SELECT nom_jeu FROM jeu WHERE id_jeu = ? ");
        $stmt3->bind_param("i", $row2['id_jeu']);
        $stmt3->execute();
        $result3 = $stmt3->get_result();

        $row3 = $result3->fetch_assoc();
        $nomJeu = $row3['nom_jeu'];
            $msg = "Le creneau du jeu : " . $nomJeu . " prevu le : " . $row2['date_Jeu'] . " a ete annule.";
            $stmt3->close();
            

            $stmt4 = $mysqli->prepare("SELECT * FROM creneaujoueur WHERE id_CreaJeu = ? ");
            $stmt4->bind_param("i", $idCreaJeu);
            $stmt4->execute();
            $result4 = $stmt4->get_result();

            while ($row4 = $result4->fetch_assoc()) {
                if (isset($row4['id_util'])) {
                    $message = $mysqli->prepare("INSERT INTO msgutil (id_util, messages) VALUES (?, ?) LIMIT 1");
                    $message->bind_param("is", $row4['id_util'], $msg);
                    $message->execute();
                    $message->close();
                } else {
                    // Gérez le cas où la valeur de 'id_util' n'est pas définie
                    echo "La valeur de 'id_util' n'est pas définie dans le résultat de la requête.";
                    exit(); // ou effectuez toute autre action nécessaire
                }
            }
        
    } else {
        // Gérez le cas où la requête ne renvoie aucun résultat
        echo "Aucun résultat trouvé pour le creneau du jeu.";
        exit(); // ou effectuez toute autre action nécessaire
    }
    $stmt->execute();
}

header("location: listCreneaux.php");
?>
