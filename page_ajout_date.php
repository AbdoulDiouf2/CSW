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
    <a class="nav-link" href="list.php">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Proposition Date</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="listCreneaux.php">Gestion Créneaux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_ProfilAdmin.php">Mon Profil</a>
  </li>  
<!--  
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
  -->
</ul>
<br><br>

<form  method="POST" action="Ajout_date_jeu.php">
    <div class="container">
    <h2>Proposition d'un créneau pour un jeu</h2>
    <div class="row my-3">
        <div class="col-md-6">
          <label for="nom" class="form-label">Séléctionnez un jeu</label>
          <select class="form-control" id="nom" name="nom" required>
          <option value="">Sélectionnez le nom du jeu...</option>
            <?php
              require_once("param.inc.php");
              $mysqli = mysqli_connect($host, $login, $passwd, $dbname);
              $sql = "SELECT id_jeu, nom_jeu FROM jeu";
              $result = $mysqli->query($sql);
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id_jeu'] . '">' . $row['nom_jeu'] . '</option>';
              }
            ?>
          </select>
        </div>

        <div class="col-md-6">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control " id="date" name="date" required>
        </div>
    </div>
    <br>  
    <div style="width: 200px; height: 100px; margin : auto;">
        <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-danger" type="submit">Ajouter une date de jeu</button></div>   
    </div>
        
    </div>
</form>
</div>

<?php
    include 'footer.admin.php';
?>
