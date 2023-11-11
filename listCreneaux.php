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

<div style="width: 200px; height: 100px; margin : auto;">

</div>
<div class="container">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="admin.php">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="list.php">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="page_ajout_date.php">Proposition Date</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Gestion Créneaux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_ProfilAdmin.php">Mon Profil</a>
  </li>  
<!--  
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
  -->
</ul>
<br><br>



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

if ($stmt = $mysqli->prepare("SELECT * FROM creationjeu WHERE 1")) 
{

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
    echo'<td><a class="btn btn-danger" href="delete_Date.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Delete</a></td>';
    if($row['Partie_terminee'] == 0) {
    echo'<td><a class="btn btn-danger" href="terminer_partie.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Terminer la partie</a></td>';
    }
    else if($row['Partie_terminee'] == 1)
    {
    echo'<td><a class="btn btn-danger" href="renouveler_partie.php?id_CreaJeu='.$i.'" role="button">Renouveler la partie</a></td>';
    }
    /*
    if($row['Partie_terminee'] == 0) {
    echo'<td><a class="btn btn-danger" href="terminer_partie.php?id_CreaJeu='.$i.'" role="button">Terminer la partie</a></td>';
    }
    else if($row['Partie_terminee'] == 1)
    {
    echo'<td><a class="btn btn-danger" href="renouveler_partie.php?id_CreaJeu='.$i.'" role="button">Renouveler la partie</a></td>';
    }
    */
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