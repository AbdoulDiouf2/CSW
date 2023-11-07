<?php
session_start();
    $titre = "Connexion";
    include 'header.inc.php';
    include 'menu.inc.php';
?>

<style>
      .homepage-container {
        position: relative;
      }

      .homepage-container::before {
          content: "";
          background-image: url('images/background.jpg');
          background-size: cover;
          background-position: center center;
          background-attachment: fixed;
          opacity: 0.2;
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: -1;
      }
</style>

<div class="container">
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
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-danger" type="submit">Connexion</button></div>   
                </div>
            </div>
        </div>
    </form>
    <br>
</div>
<?php
    include 'footer.inc.php';
?>