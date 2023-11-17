<?php

//    require_once("roleadmin.php");
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
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="page_ajout_date.php">Proposition Date</a>
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



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
      <th scope="col">Rendre Admin</th>
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
if ($stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE 1")) 
{
 
  $stmt->execute();
  $result = $stmt->get_result();   
  while($row = $result->fetch_assoc()) 
  {     
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$row['nom_util'].'</td>';
    echo'<td>'.$row['prenom_util'].'</td>';
    echo'<td>'.$row['mail_util'].'</td>';
    echo'<td>'.$row['role_util'].'</td>';
    echo'<td><a class="btn btn-danger confirmation" href="delete.php?email='.$row['mail_util'].'" role="button">Delete</a></td>';
    if($row['role_util']==1)
    {
    echo'<td><a class="btn btn-danger confirmation" href="rendremembre.php?email='.$row['mail_util'].'" role="button">Rendre membre</a></td>';

    }
    else
    {
    echo'<td><a class="btn btn-danger confirmation" href="rendreadmin.php?email='.$row['mail_util'].'" role="button">Rendre admin</a></td>';

    }
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


</div>
<?php
    include 'footer.admin.php';
?>
