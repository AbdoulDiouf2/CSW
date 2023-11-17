<?php
    session_start();
    $titre = "Administrateur";
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
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Liste des jeux disponibles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="comming_parts.php">Partie à venir</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="historique_jeu.php">Historique des jeux joués</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_profil_Membre.php">Mon Profil</a>
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
                <th scope="col">#</th>
                <th scope="col">Categorie</th>
                <th scope="col">Jeu</th>
                <th scope="col">Photo</th>
                <th scope="col">Description</th>
                <th scope="col">Regle</th>
                <th scope="col">Appreciation</th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once("param.inc.php");
            $mysqli = mysqli_connect($host,$login,$passwd,$dbname);

            $stmt1 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
            $stmt1->bind_param("s", $_SESSION['email']);
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            $row1 = $result1->fetch_assoc();

            

            $i = 1;
            if ($stmt = $mysqli->prepare("SELECT nom_jeu, desc_jeu, categorie_jeu, photo_jeu, regle_jeu, id_jeu FROM jeu WHERE 1")) {
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {

                  $stmt2 = $mysqli->prepare("SELECT joueur_aimant FROM joueurjeu WHERE id_util = ? AND id_jeu = ?");
                  $stmt2->bind_param("ii", $row1['id_util'], $row['id_jeu']);
                  $stmt2->execute();
                  $result2 = $stmt2->get_result();
                  $row2 = $result2->fetch_assoc();
                  if($result2->num_rows > 0)
                  {
                    echo '<tr>';
                    echo  '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $row['categorie_jeu'] . '</td>';
                    echo '<td>' . $row['nom_jeu'] . '</td>';
                    echo '<td><img src="images/' . $row['photo_jeu'] . '" width="200px" height="200px"></td>';
                    echo '<td>' . $row['desc_jeu'] . '</td>';
                    echo '<td><a href="regle_de_jeu/' . $row['regle_jeu'] . '" >Règle de jeu</a></td>';
                    
                    if ($row2['joueur_aimant'] == 0) {
                        echo '<td><a class="btn btn-danger" href="utilisateur_aime.php?id_Jeu='.$row['id_jeu'].'" role="button">Like</a></td>';
                    } else if ($row2['joueur_aimant'] == 1) {
                        echo '<td><a class="btn btn-danger" href="utilisateur_aime_pas.php?id_Jeu='.$row['id_jeu'].'" role="button">dislike</a></td>';
                    }
                  }
                  else
                  {
                    echo '<tr>';
                    echo  '<th scope="row">' . $i . '</th>';
                    echo '<td>' . $row['categorie_jeu'] . '</td>';
                    echo '<td>' . $row['nom_jeu'] . '</td>';
                    echo '<td><img src="images/' . $row['photo_jeu'] . '" width="200px" height="200px"></td>';
                    echo '<td>' . $row['desc_jeu'] . '</td>';
                    echo '<td><a href="regle_de_jeu/' . $row['regle_jeu'] . '" >Règle de jeu</a></td>';
                    echo '<td><a class="btn btn-danger" href="utilisateur_aime_bis.php?id_Jeu='.$row['id_jeu'].'" role="button">Like</a></td>';
                  }
                    /*
                    if ($row2['joueur_inscris'] == 0) {
                        echo '<td><a class="btn btn-danger" href="utilisateur_inscription.php?id_CreaJeu='.$row['id_jeu'].'" role="button">Inscription</a></td>';
                    } else if ($row2['joueur_inscris'] == 1) {
                        echo '<td><a class="btn btn-danger" href="utilisateur_desinscription.php?id_CreaJeu='.$row['id_jeu'].'" role="button">Desinscription</a></td>';
                    }
                    */
                    echo '</tr>';
                    $i++;
                }
            }
            ?>

        </tbody>

    </table>


</div>
<?php
    include 'footer.admin.php';
?>
