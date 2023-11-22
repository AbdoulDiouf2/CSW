<?php
    session_start();
    $titre = "Membre";
    include 'header.inc.php';
    include 'menumembre.php';
    if (!isset($_SESSION['email']) || !isset($_SESSION['isMembre']) || $_SESSION['isMembre'] !== true) {
      // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
      header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
      exit();
  }
?>

<div style="width: 200px; height: 100px; margin : auto;">

</div>
<div class="container flex-grow-1">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="membre.php" >Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="liste_jeux_membre.php">Liste des jeux disponibles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="comming_parts.php">Partie à venir</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page" >Historique des jeux joués</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_profil_Membre.php">Mon Profil</a>
  </li>  
</ul>
<br><br>

<?php
require_once("param.inc.php");
$mysqli = mysqli_connect($host,$login,$passwd,$dbname);

$stmt3 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
$stmt3->bind_param("s", $_SESSION['email']);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();

$stmt2 = $mysqli->prepare("SELECT * FROM creneaujoueur WHERE id_util = ? AND joueur_inscris = 1");
$stmt2->bind_param("i", $row3['id_util']);
$stmt2->execute();
$result2 = $stmt2->get_result(); 

?>

<div class="container">
    <h2>Historique des jeux joués</h2>
    <div class="row">

        <?php
        while($row2 = $result2->fetch_assoc())
        {
            if ($stmt1 = $mysqli->prepare("SELECT * FROM creationjeu WHERE id_CreaJeu = ? AND Partie_terminee = 1"))
            {
                $stmt1->bind_param("i", $row2['id_CreaJeu']);
                $stmt1->execute();
                $result1 = $stmt1->get_result(); 
                $row1 = $result1->fetch_assoc();

                if ($stmt = $mysqli->prepare("SELECT * FROM jeu WHERE id_jeu = ?")) 
                {
                    $stmt->bind_param("i", $row1['id_jeu']);
                    $stmt->execute();
                    $result = $stmt->get_result();   
                    while($row = $result->fetch_assoc()) 
                    {     
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top custom-img1" src="images/<?php echo $row['photo_jeu']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['nom_jeu']; ?></h5>
                                    <p class="card-text">Dernier moment joué: <?php echo $row1['date_Jeu']; ?></p>
                                    <p class="card-text"><strong>Catégorie:</strong> <?php echo $row['categorie_jeu']; ?></p>
                                    <a href="regle_de_jeu/<?php echo $row['regle_jeu']; ?>" class="btn btn-danger">Voir la règle</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
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


</div>

<?php
    include 'footer.admin.php';
?>