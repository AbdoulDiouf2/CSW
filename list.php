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
<div class="container flex-grow-1">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="admin.php">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="page_ajout_date.php">Proposition Date</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="listCreneaux.php">Gestion Créneaux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_ProfilAdmin.php">Mon Profil</a>
  </li>  
</ul>
<br><br>
<h2>Liste des utilisateurs</h2>

<?php
require_once("param.inc.php");
$mysqli = mysqli_connect($host, $login, $passwd, $dbname);

$i = 1;
if ($stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE 1")) {
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col">
                <div class="card mb-3">
                    <img src="<?php echo 'user_photo/'.$row['photo']; ?>" class="card-img-top" alt="User Image">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?php echo $row['nom_util'] . " " . $row['prenom_util']; ?></strong></h5>
                        <p class="card-text"><?php echo "<strong>Email:</strong> " . $row['mail_util']; ?></p>
                        <p class="card-text"><?php echo "<strong>Role:</strong> " . (($row['role_util'] == 1) ? 'Admin' : 'Membre'); ?></p>
                        <a href="delete.php?email=<?php echo $row['mail_util']; ?>" class="btn btn-danger confirmation" role="button">Supprimer</a>
                        <?php
                        if ($row['role_util'] == 1) {
                            echo '<a href="rendremembre.php?email=' . $row['mail_util'] . '" class="btn btn-danger confirmation" role="button">Rendre membre</a>';
                        } else {
                            echo '<a href="rendreadmin.php?email=' . $row['mail_util'] . '" class="btn btn-danger confirmation" role="button">Rendre admin</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        <?php
            $i++;
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

    </div>

    <style>
        .card {
            margin-bottom: 20px;
        }
        .card-img-top {
            width: 100px;
            height: 100px;
            object-fit: cover;
            position: absolute;
            top: 10px;
            right: 10px;
            border-radius: 50%;
        }
    </style>
<?php
}
?>


</div>
<?php
    include 'footer.admin.php';
?>
