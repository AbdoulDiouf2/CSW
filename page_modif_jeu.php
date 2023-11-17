<?php
    session_start();
    $titre = "Administrateur";
    include 'header.inc.php';
    include 'menuadmin.php';
    if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
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
    <a class="nav-link" href="admin.php">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="list.php">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled active" aria-current="page" aria-disabled="true">Modification de jeu</a>
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

<table class="table">
        <thead>
            <tr>
                <th scope="col">Catégorie</th>
                <th scope="col">Nom du jeu</th>
                <th scope="col">Description</th>
                <th scope="col">Photo</th>
                <th scope="col">Règle de jeu</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $jeu_a_modifier = $_GET['modif'];
            require_once("param.inc.php");
            $mysqli = mysqli_connect($host,$login,$passwd,$dbname);

            if ($stmt = $mysqli->prepare("SELECT * FROM jeu WHERE nom_jeu = ?")) {
                $stmt->bind_param("s", $jeu_a_modifier);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                echo '<tr>';
                echo '<td>' . $row['categorie_jeu'] . '</td>';
                echo '<td>' . $row['nom_jeu'] . '</td>';
                echo '<td>' . $row['desc_jeu'] . '</td>';
                echo '<td><img src="images/'.$row['photo_jeu'].'" width="200px" height="200px"></td>';
                echo '<td><a href="regle_de_jeu/'.$row['regle_jeu'].'" >Règle de jeu</a></td>';
                echo '</tr>';
            }
            ?>

        </tbody>
</table>

<form  method="POST" action="modif_jeu.php" enctype="multipart/form-data">
    <div class="container">

      <div class="row my-3">
        <div class="col-md-4">
          <label for="categorie" class="form-label">Categorie</label>
          <input type="text" class="form-control " id="categorie" name="categorie" placeholder="categorie du jeu..." required>
        </div>
      </div>

      <div class="row my-3">
        <div class="col-md-4">
            <label for="nom" class="form-label">Nom du jeu</label>
            <input type="text" class="form-control " id="nom" name="nom" placeholder="le nom du jeu..." required>
        </div>
      </div>
      
      <div class="row my-3">
        <div class="col-md-4">
            <label for="description" class="form-label">Description du jeu</label>
            <textarea type="text" id="description" name="description" rows="6" class="form-control md-textarea"></textarea>
        </div>
      </div>

      <div class="row my-3">
        <div class="col-md-4">
            <label for="photo" class="form-label">Ajout d'une photo</label>
            <input type="file" name="userfile" id="photo" class="form-control" required>            
        </div>
      </div>
      
      <div class="row my-3">
        <div class="col-md-4">
          <label for="regle" class="form-label">Regle</label>
          <input type="file" name="userpdf" id="pdf" class="form-control" required>
        </div>
      </div>

      <div style="width: 200px; height: 100px; margin : auto;">
        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-outline-danger confirmation" type="submit" name="modifier">
            Modifier
          </button>
        </div>   
      </div>
        
    </div>
</form>
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

<?php
    include 'footer.admin.php';
?>
