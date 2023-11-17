<?php
session_start();
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
  <a class="nav-link" href="liste_jeux_membre.php">Liste des jeux disponibles</a>
  </li>
  <li class="nav-item">

    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Partie à venir</a>
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

    <h1>Jeux que vous aimez</h1> <!-- Le texte au-dessus de la première liste -->
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
$mysqli = mysqli_connect("localhost", "root", $passwd, "tp");
//Id utilisateur
$stmt1 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
$stmt1->bind_param("s", $_SESSION['email']);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();


//id jeu que l'utilisateur aime
$stmt2 = $mysqli->prepare("SELECT id_jeu FROM joueurjeu WHERE id_util = ? AND joueur_aimant = 1");
$stmt2->bind_param("s", $row1['id_util']);
$stmt2->execute();
$result2 = $stmt2->get_result();



$i=1;

  
while($row2 = $result2->fetch_assoc()) 
{
if ($stmt = $mysqli->prepare("SELECT * FROM creationjeu WHERE id_jeu = ? AND Partie_terminee = 0" )) 
{
  $stmt->bind_param("i", $row2['id_jeu']);
  $stmt->execute();
  $result = $stmt->get_result(); 
  while($row = $result->fetch_assoc()) 
{
  if ($stmt4 = $mysqli->prepare("SELECT * FROM creneaujoueur WHERE id_CreaJeu = ? AND id_util = ?" )) 
  {
    $stmt4->bind_param("ii", $row['id_CreaJeu'], $row1['id_util']);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row4 = $result4->fetch_assoc();
    
    $stmt35 = $mysqli->prepare("SELECT nom_jeu FROM jeu WHERE id_jeu = ?");
    $stmt35->bind_param("i", $row2['id_jeu']);
    $stmt35->execute();
    $stmt35->bind_result($nomJeu);
    $stmt35->fetch();
    $stmt35->close();
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$nomJeu.'</td>';
    echo'<td>'.$row['date_Jeu'].'</td>';
    if($result4->num_rows > 0) {
    
    echo'<td><a class="btn btn-danger confirmation" href="utilisateur_desinscription.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Desinscription</a></td>';
    }
    else 
    {
    echo'<td><a class="btn btn-danger confirmation" href="utilisateur_inscription.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Inscription</a></td>';
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
    


    <h1>Jeux que vous pourrez aimer</h1> <!-- Le texte au-dessus de la deuxième liste -->

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
$mysqli = mysqli_connect("localhost", "root", $passwd, "tp");
//Id utilisateur
$stmt1 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
$stmt1->bind_param("s", $_SESSION['email']);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();


//id jeu que l'utilisateur aime
$stmt2 = $mysqli->prepare("SELECT id_jeu FROM joueurjeu WHERE id_util = ? AND joueur_aimant = 0");
$stmt2->bind_param("s", $row1['id_util']);
$stmt2->execute();
$result2 = $stmt2->get_result();



$i=1;

  
while($row2 = $result2->fetch_assoc()) 
{
if ($stmt = $mysqli->prepare("SELECT * FROM creationjeu WHERE id_jeu = ? AND Partie_terminee = 0" )) 
{
  $stmt->bind_param("i", $row2['id_jeu']);
  $stmt->execute();
  $result = $stmt->get_result(); 
  while($row = $result->fetch_assoc()) 
{
  if ($stmt4 = $mysqli->prepare("SELECT * FROM creneaujoueur WHERE id_CreaJeu = ? AND id_util = ?" )) 
  {
    $stmt4->bind_param("ii", $row['id_CreaJeu'], $row1['id_util']);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row4 = $result4->fetch_assoc();
    
    $stmt35 = $mysqli->prepare("SELECT nom_jeu FROM jeu WHERE id_jeu = ?");
    $stmt35->bind_param("i", $row2['id_jeu']);
    $stmt35->execute();
    $stmt35->bind_result($nomJeu);
    $stmt35->fetch();
    $stmt35->close();
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$nomJeu.'</td>';
    echo'<td>'.$row['date_Jeu'].'</td>';
    if($result4->num_rows > 0) {
    
    echo'<td><a class="btn btn-danger confirmation" href="utilisateur_desinscription.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Desinscription</a></td>';
    }
    else 
    {
    echo'<td><a class="btn btn-danger confirmation" href="utilisateur_inscription.php?id_CreaJeu='.$row['id_CreaJeu'].'" role="button">Inscription</a></td>';
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