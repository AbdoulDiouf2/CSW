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
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page" >Historique des jeux joués</a>
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
      <th scope="col">Nom du Jeu</th>
      <th scope="col">Dernier moment joué</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Photo du jeu</th>
      <th scope="col">Règle de jeu</th>
    </tr>
  </thead>
  <tbody>
  
    <?php
        require_once("param.inc.php");
        $mysqli = new mysqli($host, $login, $passwd, "tp");
        
        $i=1;


        $stmt3 = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
        $stmt3->bind_param("s", $_SESSION['email']);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        $row3 = $result3->fetch_assoc();


        $stmt2 = $mysqli->prepare("SELECT * FROM creneaujoueur WHERE id_util = ? AND joueur_inscris = 1");
        $stmt2->bind_param("i", $row3['id_util']);
        $stmt2->execute();
        $result2 = $stmt2->get_result(); 
        $row2 = $result2->fetch_assoc();


        $stmt1 = $mysqli->prepare("SELECT * FROM creationjeu WHERE id_CreaJeu = ?");
        $stmt1->bind_param("i", $row2['id_CreaJeu']);
        $stmt1->execute();
        $result1 = $stmt1->get_result(); 
        while($row1 = $result1->fetch_assoc())
        {


        if ($stmt = $mysqli->prepare("SELECT * FROM jeu WHERE id_jeu = ?")) 
        {
            $stmt->bind_param("i", $row1['id_jeu']);
            $stmt->execute();
            $result = $stmt->get_result();   
            while($row = $result->fetch_assoc()) 
            {     
                echo '<tr>';     
                echo  '<th scope="row">'.$i.'</th>';
                echo '<td>' . $row['nom_jeu'] . '</td>';
                echo '<td>' . $row1['date_Jeu'] . '</td>';
                echo '<td>' . $row['categorie_jeu'] . '</td>';
                echo '<td>' . $row['photo_jeu'] . '</td>';
                echo '<td>' . $row['regle_jeu'] . '</td>';
                echo '</tr>';
                $i++;   
            }
        }
        }
    ?>

</tbody>

</table>



<br><br><br><br>

</div>

<?php
    include 'footer.admin.php';
?>