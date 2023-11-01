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
<br><br><br><br>
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
$mysqli = mysqli_connect("localhost","root","root","tp");
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



<br><br><br><br>

</div>
<?php
    include 'footer.inc.php';
?>

