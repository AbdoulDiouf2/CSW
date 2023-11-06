<?php
session_start();
$titre = "Administrateur";
include 'header.inc.php';
include 'menuadmin.php';
if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
}
?>

<div class="container">
<h1></h1> 

<div style="width: 200px; height: 100px; margin : auto;">
    <a class="btn btn-primary" href="page_ajout_admin.php" role="button">Ajouter un profil Administrateur</a>

</div>
    <h1>Informations Admin</h1> <!-- Le texte au-dessus de la première liste -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once("param.inc.php");
            $mysqli = mysqli_connect("localhost", "root", $passwd, "tp");

            if ($stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE mail_util = ?")) {
                $stmt->bind_param("s", $_SESSION['email']);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                echo '<tr>';
                echo '<td>' . $row['nom_util'] . '</td>';
                echo '<td>' . $row['prenom_util'] . '</td>';
                echo '<td>' . $_SESSION['email'] . '</td>';
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>

    <h1>Liste des parties créée par l'administrateur</h1> <!-- Le texte au-dessus de la deuxième liste -->

    <table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom du jeu</th>
        <th scope="col">date du jeu</th>
    </tr>
  </thead>
  <tbody>

  <?php
require_once("param.inc.php");
$mysqli = mysqli_connect("localhost","root",$passwd,"tp");
/*
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
*/


$i=1;
if ($stmt = $mysqli->prepare("SELECT * FROM creationjeu WHERE id_utilJeu = ?")) 
{
  $stmt->bind_param("i", $row['id_util'] );
  $stmt->execute();
  $result = $stmt->get_result();   
  while($row = $result->fetch_assoc()) 
  {     
    $stmt2 = $mysqli->prepare("SELECT nom_jeu FROM jeu WHERE id_jeu = ?");
    $stmt2->bind_param("i", $row['id_jeu']);
    $stmt2->execute();
    $stmt2->bind_result($nomJeu);
    $stmt2->fetch();
    $stmt2->close();
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$nomJeu.'</td>';
    echo'<td>'.$row['date_Jeu'].'</td>';
    echo'<td><a class="btn btn-danger" href="delete_Date.php?id_CreaJeu='.$i.'" role="button">Delete</a></td>';
    echo '</tr>';
$i++;   
}
}
?>

</tbody>

</table>
</div>

<?php
include 'footer.admin.php';
?>