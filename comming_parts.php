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
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Partie à venir</a>
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

<!-- ************** à compléter ************* -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom du Jeu</th>
      <th scope="col">Date et heure de la partie</th>      
      <th scope="col">Description</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Nombre de participants</th>
      <th scope="col">Photo du jeu</th>

    </tr>
  </thead>
  <tbody>
  
    <?php
        require_once("param.inc.php");
        $mysqli = mysqli_connect("localhost","root",$passwd,"tp");
        
        $i=1;
        if ($stmt = $mysqli->prepare("SELECT jeu.nom_jeu, historiquejeu.date_jeu, jeu.categorie_jeu, jeu.photo_jeu, jeu.regle_jeu FROM historiquejeu JOIN jeu ON historiquejeu.id_jeu = jeu.id_jeu WHERE 1")) 
        {
            $stmt->execute();
            $result = $stmt->get_result();   
            while($row = $result->fetch_assoc()) 
            {     
                echo '<tr>';     
                echo  '<th scope="row">'.$i.'</th>';
                echo '<td>' . $row['nom_jeu'] . '</td>';
                echo '<td>' . $row['date_Jeu'] . '</td>';
                echo '<td>' . $row['categorie_jeu'] . '</td>';
                echo '<td>' . $row['photo_jeu'] . '</td>';
                echo '<td>' . $row['regle_jeu'] . '</td>';
                echo '</tr>';
                $i++;   
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