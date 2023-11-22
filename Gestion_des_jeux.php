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

<?php
        if(isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }
    ?>



<div class="container">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link"  href="admin.php">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="list.php">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Gestion des jeux</a>
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
  
  <php
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
if ($stmt = $mysqli->prepare("SELECT * FROM jeu WHERE 1")) 
{
 
  $stmt->execute();
  $result = $stmt->get_result();   
  while($row = $result->fetch_assoc()) 
  {     
    echo '<tr>';     
    echo '<th scope="row">'.$i.'</th>';
    echo '<td>'.$row['categorie_jeu'].'</td>';
    echo '<td>'.$row['nom_jeu'].'</td>';
    echo '<td><img src="images/'.$row['photo_jeu'].'" width="200px" height="200px"></td>';
    echo '<td>'.$row['desc_jeu'].'</td>';
    echo '<td><a href="regle_de_jeu/'.$row['regle_jeu'].'" >Règle de jeu</a></td>';
    echo '<td><a class="btn btn-danger" href="page_modif_jeu.php?modif='.$row['nom_jeu'].'" role="button">Modifier</a></td>';
    echo '<td><a class="btn btn-danger confirmation" href="delete_jeu.php?jeu='.$row['nom_jeu'].'" role="button">Delete</a></td>';
    echo '<td><a class="btn btn-danger " href="liste_aimant.php?id_Jeu='.$row['id_jeu'].'" role="button">Voir les inscris</a></td>';
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
  -->

<?php
require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);

$i = 1;
if ($stmt = $mysqli->prepare("SELECT * FROM jeu WHERE 1")) {
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="container">
        <h2>Liste des jeux</h2>
        <div style="width: 200px; height: 100px; margin : auto;">
          <a class="btn btn-danger" href="page_ajout_jeu.php" role="button">Ajouter un jeu</a> 
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?php echo $row['nom_jeu']; ?></strong></h5>
                            <p class="card-text"><?php echo $row['desc_jeu']; ?></p>
                            <p class="card-text"><strong>Catégorie:</strong> <?php echo $row['categorie_jeu']; ?></p>
                            <img class="card-img-top custom-img1" src="images/<?php echo $row['photo_jeu']; ?>" alt="Card image cap">
                            <br>
                            <a class="btn btn-danger" href="page_modif_jeu.php?modif=<?php echo $row['nom_jeu']; ?>" role="button">Modifier</a>
                            <a class="btn btn-danger confirmation" href="delete_jeu.php?jeu=<?php echo $row['nom_jeu']; ?>" role="button">Delete</a>
                            <a class="btn btn-danger" href="liste_aimant.php?id_Jeu=<?php echo $row['id_jeu']; ?>" role="button">Voir les aimants</a>
                            <a href="regle_de_jeu/<?php echo $row['regle_jeu']; ?>" class="btn btn-danger">Règle</a>
                        </div>
                    </div>
                </div>
            <?php
                $i++;
            }
            ?>

        </div>
    </div>

    <style>
        .custom-img1 {
            width: 65%;
            height: 200px; /* Réglez la hauteur souhaitée */
        }
    </style>

    <script type="text/javascript">
        var elems = document.getElementsByClassName('confirmation');
        var confirmIt = function (e) {
            if (!confirm('Are you sure?')) e.preventDefault();
        };
        for (var i = 0, l = elems.length; i < l; i++) {
            elems[i].addEventListener('click', confirmIt, false);
        }
    </script>

<?php
}
?>



</div>
<?php
    include 'footer.admin.php';
?>
