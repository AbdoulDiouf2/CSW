<?php
  session_start();
  $titre = "Membre";
  include 'header.inc.php';
  include 'menumembre.php';
  if (!isset($_SESSION['email']) || !isset($_SESSION['isMembre']) || $_SESSION['isMembre'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
  }
?>
<div style="width: 200px; height: 100px; margin : auto;">

</div>
<div class="container flex-grow-1">
<ul class="nav nav-tabs">
  <li class="nav-item">
  <a class="nav-link" href="membre.php" >Accueil</a>
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
  <a class="nav-link active disabled" aria-disabled="true" aria-current="page" >Mes messages</a>
  </li>   
</ul>
<br><br>
<h2>Liste des messages</h2>

<table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">message</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);
//Id utilisateur
$stmt1 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
$stmt1->bind_param("s", $_SESSION['email']);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();



$stmt2 = $mysqli->prepare("SELECT * FROM msgutil WHERE id_util = ? ");
$stmt2->bind_param("s", $row1['id_util']);
$stmt2->execute();
$result2 = $stmt2->get_result();



$i=1;

  
while($row2 = $result2->fetch_assoc()) 
{

    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$row2['messages'].'</td>';
    echo'<td><a class="btn btn-danger confirmation" href="supprimer_msg.php?id_msg='.$row2['id_msg'].'" role="button">Supprimer</a></td>';
    echo '</tr>';
    $i++; 
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
