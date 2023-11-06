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

<form  method="POST" action="Ajouter_un_jeu.php">
    <div class="container">
    <div class="row my-3">
        <div class="col-md-6">
            <label for="nom" class="form-label">Nom du jeu</label>
            <input type="text" class="form-control " id="nom" name="nom" placeholder="le nom du jeu..." required>
        </div>
        <div class="col-md-6">
            <label for="photo" class="form-label">photo (text)</label>
            <input type="text" class="form-control " id="photo" name="photo" placeholder="la photo du jeu..." required>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4">
            <label for="description" class="form-label">Description du jeu</label>
            <input type="text" class="form-control " id="description" name="description" placeholder="la description du jeu..." required>
        </div>
        <div class="col-md-4">
            <label for="categorie" class="form-label">Categorie</label>
            <input type="text" class="form-control " id="categorie" name="categorie" placeholder="categorie du jeu..." required>
        </div>
        <div class="col-md-4">
            <label for="regle" class="form-label">Regle</label>
            <input type="text" class="form-control " id="regle" name="regle" placeholder="regle du jeu..." required>
        </div>
        </div>
        <div style="width: 200px; height: 100px; margin : auto;">

        </div>
        <div style="width: 200px; height: 100px; margin : auto;">
        <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Ajouter un jeu</button></div>   
        </div>
        
    </div>
</form>
</div>

<?php
    include 'footer.admin.php';
?>
