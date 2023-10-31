<?php
    session_start();
    $titre = "Membre";
    include 'header.inc.php';
    include 'menumembre.php';
?>
<div class="container">
    <br><br><br><br>

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
        $mysqli = mysqli_connect("localhost","root","root","tp");
        
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
    include 'footer.inc.php';
?>