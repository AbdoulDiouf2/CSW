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
    <a class="nav-link"  href="admin.php">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="list.php">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_ajout_date.php">Proposition Date</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="listCreneaux.php">Gestion Créneaux</a>
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

<div style="width: 200px; height: 100px; margin : auto;">
<a class="btn btn-danger" href="page_ajout_jeu.php" role="button">Ajouter un jeu</a> 
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Categorie</th>
      <th scope="col">Jeu</th>
      <th scope="col">Photo</th>
      <th scope="col">Description</th>
      <th scope="col">Regle</th>
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
  while($row = $result->fetch_assoc()) 
  {     
    echo '<tr>';     
    echo '<th scope="row">'.$i.'</th>';
    echo '<td>'.$row['categorie_jeu'].'</td>';
    echo '<td>'.$row['nom_jeu'].'</td>';
    echo '<td><img src="images/'.$row['photo_jeu'].'" width="200px" height="200px"></td>';
    echo '<td>'.$row['desc_jeu'].'</td>';
    echo '<td>'.$row['regle_jeu'].'</td>';
    echo '<td><a class="btn btn-danger" href="page_modif_jeu.php?modif='.$row['nom_jeu'].'" role="button">Modifier</a></td>';
    echo '<td><a class="btn btn-danger" href="delete_jeu.php?jeu='.$row['nom_jeu'].'" role="button">Delete</a></td>';
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
