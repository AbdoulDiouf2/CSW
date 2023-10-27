<?php
    session_start();
    $titre = "Administrateur";
    include 'header.inc.php';
    include 'menuadmin.php';
?>
<div style="width: 200px; height: 100px; margin : auto;">

</div>




<div class="container">

<form  method="POST" action="Ajout_date_jeu.php">
    <div class="container">
    <div class="row my-3">
        <div class="col-md-6">
            <label for="nom" class="form-label">Nom du jeu</label>
            <input type="text" class="form-control " id="nom" name="nom" placeholder="le nom du jeu..." required>
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label">Date</label>
            <input type="text" class="form-control " id="date" name="date" placeholder="la date du jeu..." required>
        </div>
    </div>
    <div class="row my-6">
        <div class="col-md-6">
            <label for="email" class="form-label">votre email</label>
            <input type="text" class="form-control " id="email" name="email" placeholder="votre email..." required>
        </div>
    </div>

        
    </div>
        <div style="width: 200px; height: 100px; margin : auto;">

        </div>
            <div style="width: 200px; height: 100px; margin : auto;">
                <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Ajouter une date de jeu</button></div>   
            </div>
        
    </div>
</form>
</div>

<?php
    include 'footer.inc.php';
?>
