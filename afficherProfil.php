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
      <th scope="col">Nom</th>
<<<<<<< HEAD

    </tr>
  </thead>
  <tbody>

  <?php
require_once("tt_connexion.php");
$mysqli = mysqli_connect("localhost","root","root","tp");
=======
      
    </tr>
  </thead>
  <tbody>
  
  <?php
require_once("tt_connexion.php");
$mysqli = mysqli_connect("localhost","root","","tp");
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
/*
// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, $passwd, $dbname);
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
*/

$requeteSelect3 = $mysqli->prepare("SELECT nom_util FROM utilisateur WHERE mail_util = ?");
    $requeteSelect3->bind_param("s", $email); 
    $requeteSelect3->execute();
    $requeteSelect3->bind_result($nomUtilisateur);
    $requeteSelect3->fetch();
    $requeteSelect3->close();
    echo '<tr>';     
<<<<<<< HEAD

    echo'<td>'.$row['nom_util'].'</td>';

=======
    
    echo'<td>'.$row['nom_util'].'</td>';
  
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
    echo '</tr>';
?>

</tbody>

</table>


</div>
<?php
    include 'footer.inc.php';
<<<<<<< HEAD
?>
=======
?>
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
