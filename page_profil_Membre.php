<?php
session_start();
$titre = "Membre";
include 'header.inc.php';
include 'menumembre.php';

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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once("param.inc.php");
            $mysqli = mysqli_connect("localhost", "root", $passwd, "tp");

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

    
</div>

<?php
include 'footer.admin.php';
?>