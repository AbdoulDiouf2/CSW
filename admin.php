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
<?php
  require_once("param.inc.php");
  $mysqli = mysqli_connect($host, $login, $passwd, $dbname);

  if ($stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE mail_util = ?")) {
      $stmt->bind_param("s", $_SESSION['email']);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      echo "<h1 style = 'color: #990000; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word'>Bienvenue " . $row['prenom_util'] . ' ' . $row['nom_util'] . ",</h1>";
  }
?>
<div style="width: 200px; height: 100px; margin : auto;">

</div>

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
    
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page" >Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="list.php">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_ajout_date.php">Proposition Date</a>
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
<!--
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
  
  --php
require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname);
/*

// Connexion :
require_once("param.inc.php");
$mysqli = new mysqli($host, $login, , $dbname);
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
    echo '<td><img src="images/'.$row['photo_jeu'].'" width="200px" height="200px"></td>';
    echo'<td>'.$row['desc_jeu'].'</td>';
    echo '<td><a href="regle_de_jeu/'.$row['regle_jeu'].'" >Règle de jeu</a></td>';
    echo '</tr>';
$i++;   
}
}
--?>

</tbody>

</table>
-->

<?php
require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);

$i = 1;
if ($stmt = $mysqli->prepare("SELECT nom_jeu, desc_jeu, categorie_jeu, photo_jeu, regle_jeu FROM jeu WHERE 1")) {
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="container">
        <h2>Liste des jeux</h2>
        <div class="row">

            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top custom-img1" src="images/<?php echo $row['photo_jeu']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nom_jeu']; ?></h5>
                            <p class="card-text"><?php echo $row['desc_jeu']; ?></p>
                            <p class="card-text"><strong>Catégorie:</strong> <?php echo $row['categorie_jeu']; ?></p>
                            <a href="regle_de_jeu/<?php echo $row['regle_jeu']; ?>" class="btn btn-danger">Voir la règle</a>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>

        </div>
    </div>

    <?php
}
?>
<style>
  .custom-img1 {
        width: 65%;
        height: 200px; /* Réglez la hauteur souhaitée */
    }
</style>



<br><br><br><br>

</div>
<?php
    include 'footer.admin.php';
?>

