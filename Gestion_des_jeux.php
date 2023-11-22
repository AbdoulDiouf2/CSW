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
</ul>
<br><br>

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
                            <a class="btn btn-outline-danger" href="page_modif_jeu.php?modif=<?php echo $row['nom_jeu']; ?>" role="button">Modifier</a>
                            <a class="btn btn-outline-danger confirmation" href="delete_jeu.php?jeu=<?php echo $row['nom_jeu']; ?>" role="button">Delete</a>
                            <a class="btn btn-outline-danger" href="liste_aimant.php?id_Jeu=<?php echo $row['id_jeu']; ?>" role="button">Voir les aimants</a>
                            <a href="regle_de_jeu/<?php echo $row['regle_jeu']; ?>" class="btn btn-outline-danger">Règle</a>
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
            height: 200px;
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
