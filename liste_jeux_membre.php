<?php
    session_start();
    $titre = "Administrateur";
    include 'header.inc.php';
    include 'menumembre.php';
?>
<div style="width: 200px; height: 100px; margin : auto;">

</div>
<div class="container">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="membre.php" >Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Liste des jeux disponibles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="comming_parts.php">Partie à venir</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="historique_jeu.php">Historique des jeux joués</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_profil_Membre.php">Mon Profil</a>
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
      <th scope="col">Categorie</th>
      <th scope="col">Jeu</th>
      <th scope="col">Photo</th>
      <th scope="col">Description</th>
      <th scope="col">Regle</th>
      <th scope="col">Appreciation</th>
      <th scope="col">Inscription</th>
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
if ($stmt = $mysqli->prepare("SELECT nom_jeu, desc_jeu, categorie_jeu, photo_jeu, regle_jeu FROM jeu WHERE 1")) 
{
 
  $stmt->execute();
  $result = $stmt->get_result();   

  $stmt1 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
  $stmt1->bind_param("s", $_SESSION['email']);
  $stmt1->execute();
  $id_util = $stmt1->get_result();
  $stmt2 = $mysqli->prepare("SELECT joueur_inscris, joueur_aimant FROM joueurjeu WHERE id_util = ?");
  $stmt2->bind_param("i", $id_util);
  $stmt2->execute();
  
  $result1 = $stmt2->get_result();
  $row1 = $result1->fetch_assoc();
  
  while($row = $result->fetch_assoc()) 
  {     
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$row['categorie_jeu'].'</td>';
    echo'<td>'.$row['nom_jeu'].'</td>';
    echo'<td>'.$row['photo_jeu'].'</td>';
    echo'<td>'.$row['desc_jeu'].'</td>';
    echo'<td>'.$row['regle_jeu'].'</td>';
    if($row1['joueur_aimant'] == 0) {
      echo'<td><a class="btn btn-danger" href="utilisateur_aime.php?id_CreaJeu='.$i.'" role="button">Like</a></td>';
      }
      else if($row1['joueur_aimant'] == 1)
      {
      echo'<td><a class="btn btn-danger" href="utilisateur_aime_pas.php?id_CreaJeu='.$i.'" role="button">dislike</a></td>';
      }
      if($row1['joueur_inscris'] == 0) {
        echo'<td><a class="btn btn-danger" href="utilisateur_inscription.php?id_CreaJeu='.$i.'" role="button">Inscription</a></td>';
        }
        else if($row1['joueur_inscris'] == 1)
        {
        echo'<td><a class="btn btn-danger" href="utilisateur_desinscription.php?id_CreaJeu='.$i.'" role="button">Desinscription</a></td>';
        }
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
