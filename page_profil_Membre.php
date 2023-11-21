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
<div class="container">
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
    <a class="nav-link" href="historique_jeu.php">Historique des jeux joués</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Mon Profil</a>
  </li>  
<!--  
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
  -->
</ul>
<br><br>
<h1>Informations Membre</h1> 
    <?php
      require_once("param.inc.php");
      $mysqli = mysqli_connect($host,$login,$passwd,$dbname);
      $stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE mail_util = ?");
      $stmt->bind_param("s", $_SESSION['email']);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
    ?>
    <!--
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>

            <php
            require_once("param.inc.php");
            $mysqli = mysqli_connect($host,$login,$passwd,$dbname);

            if ($stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE mail_util = ?")) {
                $stmt->bind_param("s", $_SESSION['email']);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                echo '<tr>';
                echo '<td>' . $row['nom_util'] . '</td>';
                echo '<td>' . $row['prenom_util'] . '</td>';
                echo '<td>' . $_SESSION['email'] . '</td>';
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>
          -->
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 20%;
            border-radius: 5px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .container {
            padding: 2px 16px;
        }
    </style>
    <div class="card">
      <div class="container">
        <img src="<?php echo 'user_photo/'.$row['photo']; ?>" alt="Avatar" style="width:100%; height:100%; object-fit: cover; border-radius: 5px;">
        <p><b>Nom : <?php echo $row['nom_util']; ?></b></p> 
        <p><b>Prénom : </b><?php echo $row['prenom_util']; ?></p> 
        <p><b>Email : </b><?php echo $_SESSION['email']; ?></p> 
        <a class="btn btn-outline-danger" href="page_modif_information_membre.php?modif=<?php echo $_SESSION['email']; ?>" role="button">Modifier mes informations</a>
      </div>
    </div>

</div>

<?php
include 'footer.admin.php';
?>