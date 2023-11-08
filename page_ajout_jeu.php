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
    <a class="nav-link disabled active" aria-current="page" aria-disabled="true">Ajout de jeu</a>
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

<form  method="POST" action="Ajouter_un_jeu.php" enctype="multipart/form-data">
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
            <input type="file" name="userfile" id="photo" class="form-control" />            
        </div>
      </div>
      
      <div class="row my-3">
        <div class="col-md-4">
          <label for="regle" class="form-label">Regle</label>
          <input type="text" class="form-control " id="regle" name="regle" placeholder="regle du jeu..." required>
        </div>
      </div>

      <div style="width: 200px; height: 100px; margin : auto;">
        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-outline-danger" type="submit">
            Ajouter un jeu
          </button>
        </div>   
      </div>
        
    </div>
</form>
</div>

<?php
    include 'footer.admin.php';
?>
