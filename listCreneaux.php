<?php
    session_start();
    $titre = "Administrateur";
    include 'header.inc.php';
    include 'menuadmin.php';
?>
<div class="container">
<h1>Contenu</h1>



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
    echo'<td><a class="btn btn-danger" href="delete_Date.php?id_CreaJeu='.$i.'" role="button">Delete</a></td>';
    if($row['Partie_terminee'] == 0) {
    echo'<td><a class="btn btn-danger" href="terminer_partie.php?id_CreaJeu='.$i.'" role="button">Terminer la partie</a></td>';
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
    include 'footer.inc.php';
?>