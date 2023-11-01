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
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$row['categorie_jeu'].'</td>';
    echo'<td>'.$row['nom_jeu'].'</td>';
    echo'<td>'.$row['photo_jeu'].'</td>';
    echo'<td>'.$row['desc_jeu'].'</td>';
    echo'<td>'.$row['regle_jeu'].'</td>';
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
