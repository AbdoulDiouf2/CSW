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


<?php
    

    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
    ?>
    <!--  
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page" >Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="liste_jeux_membre.php">Liste des jeux disponibles</a>
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
      <th scope="col">nom</th>
      <th scope="col">prenom</th>>
    </tr>
  </thead>
  <tbody>
  
  <?php
require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname);
/*

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
*/
$idJeu=$_GET['id_Jeu'];


$i=1;
if ($stmt = $mysqli->prepare("SELECT id_util FROM joueurjeu WHERE id_jeu = ? AND joueur_aimant = 1")) 
{
  $stmt->bind_param("i", $idJeu);
  $stmt->execute();
  $result = $stmt->get_result();   
  while($row = $result->fetch_assoc()) 
  {     
    $stmt1 = $mysqli->prepare("SELECT * FROM utilisateur WHERE id_util = ? LIMIT 1");
    $stmt1->bind_param("i", $row['id_util']);
    $stmt1->execute();
    $result1 = $stmt1->get_result();   
    $row1 = $result1->fetch_assoc();
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$row1['nom_util'].'</td>';
    echo'<td>'.$row1['prenom_util'].'</td>';
    echo '</tr>';
$i++;   
}
}
?>

</tbody>

</table>



<br><br><br><br>

</div>
<?php
    include 'footer.admin.php';
?>

