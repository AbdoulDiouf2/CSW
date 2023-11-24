<?php
    session_start();
    $titre = "Membre";
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
<div class="container flex-grow-1">


<?php
    

    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
    ?>
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
    <a class="nav-link"  href="listCreneaux.php">Gestion Créneaux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Liste inscrits</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_ProfilAdmin.php">Mon Profil</a>
  </li>
</ul>
<br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>>
      <th scope="col">action</th>>
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
$idCreaJeu=$_GET['id_CreaJeu'];
$nomJeu=$_GET['nom_jeu'];

$i=1;
if ($stmt = $mysqli->prepare("SELECT * FROM creneaujoueur WHERE id_CreaJeu = ? AND joueur_inscris = 1")) 
{
  $stmt->bind_param("i", $idCreaJeu);
  $stmt->execute();
  $result = $stmt->get_result();   
  while($row = $result->fetch_assoc()) 
  {     
    
    $stmt1 = $mysqli->prepare("SELECT * FROM utilisateur WHERE id_util = ? LIMIT 1");

    $stmt1->bind_param("i", $row['id_util']);
    $stmt1->execute();
    
    $result1 = $stmt1->get_result();   
    $row1 = $result1->fetch_assoc();
    if($row1 > 0)
    {
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$row1['nom_util'].'</td>';
    echo'<td>'.$row1['prenom_util'].'</td>';
    echo'<td><a class="btn btn-danger confirmation" href="membre_desinscription.php?id_CreaJeu='.$idCreaJeu.'&id_util=' . $row['id_util'] .'&nomJeu=' . $nomJeu .'" role="button">Desinscrire</a></td>';
    echo '</tr>';
$i++;   
    }
}
}
?>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
</tbody>

</table>



<br><br><br><br>

</div>
<?php
    include 'footer.admin.php';
?>

