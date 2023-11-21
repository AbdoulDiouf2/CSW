<?php
session_start();
    $titre = "Connexion";
    include 'header.inc.php';
    include 'menu.inc.php';
?>

<div class="container flex-grow-1">
    <br><br>
    <h1 style="color: #FF6666;">Connexion</h1>
    <?php
        if(isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }
    ?>
    <br>
    <form  method="POST" action="tt_connexion.php">
        <div class="container">
            <div class="row my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control " id="email" name="email" placeholder="Votre email..." required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control " id="password" name="password" placeholder="Votre mot de passe..." required>
                        <input type="checkbox" onclick="myFunction()"> Afficher le mot de passe
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-danger" type="submit">Connexion</button></div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-6">
                    <a href="#" onclick="alert('Cette option n\'est pas disponible pour le moment ! 😞\nFaites le nécessaire pour ne pas oublier votre mot de passe ! 😉'); return false;">Mot de passe oublié ?</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous !!!</a></p>
                </div>
            </div>
        </div>
    </form>
    <script>
        function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
</script>
    <br>
</div>
<?php
    include 'footer.inc.php';
?>