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


<h2>Liste des créneaux</h2>
<table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom du jeu</th>
        <th scope="col">date du jeu</th>
        <th scope="col">Action</th>
        <th scope="col"></th>
        <th scope="col"></th>
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
    echo'<td><a class="btn btn-danger confirmation" href="delete_Date.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Delete</a></td>';
    if($row['Partie_terminee'] == 0) {
    echo'<td><a class="btn btn-danger confirmation" href="terminer_partie.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Terminer la partie</a></td>';
    }
    else if($row['Partie_terminee'] == 1)
    {
    echo'<td><a class="btn btn-danger confirmation" href="renouveler_partie.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Renouveler la partie</a></td>';
    }
    echo'<td><a class="btn btn-danger " href="liste_inscris_admin.php?id_CreaJeu='.$row['id_CreaJeu'].'&nom_jeu=' . $nomJeu .'" role="button">voir les joueurs inscrits</a></td>';

    echo '</tr>';
$i++;   
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
<!-- **************************************************************** -->
<br><br>
<!-- **************************************************************** -->

</div>
<?php
    include 'footer.admin.php';
?>