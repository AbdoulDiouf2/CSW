<?php

//    require_once("roleadmin.php");
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
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
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
    echo'<td><a class="btn btn-danger" href="delete.php?email='.$row['mail_util'].'" role="button">Delete</a></td>';
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
