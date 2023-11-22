<?php
    session_start();
    $titre = "Administrateur";
    include 'header.inc.php';
    include 'menuadmin.php';
    if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
      header("Location: tt_connexion.php");
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
      echo "<h1 style = 'color: #990000; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word'>Bienvenue " . $row['prenom_util'] . ' ' . $row['nom_util'] . "</h1>";
  }
?>
<div style="width: 200px; height: 100px; margin : auto;">

</div>

<div class="container flex-grow-1">


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
</ul>
<br><br>

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
        height: 200px;
    }
</style>
<br><br><br><br>
</div>
<?php
    include 'footer.admin.php';
?>

