<?php
    session_start();
    $titre = "Membre";
    include 'header.inc.php';
    include 'menumembre.php';
    if (!isset($_SESSION['email']) || !isset($_SESSION['isMembre']) || $_SESSION['isMembre'] !== true) {
        // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
        header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
        exit();
    }
?>
<div style="width: 200px; height: 100px; margin : auto;">

</div>




<div class="container flex-grow-1">
<?php 
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
?>
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
    <a class="nav-link" href="historique_jeu.php">Historique des jeux joués</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="page_profil_Membre.php">Mon Profil</a>
  </li>  
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Modifier mes informations</a>
  </li>  
</ul>
<br>
<h1>Modification de vos informations</h1> 
    <?php
      require_once("param.inc.php");
      $mysqli = mysqli_connect($host,$login,$passwd,$dbname);
      $stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE mail_util = ?");
      $stmt->bind_param("s", $_SESSION['email']);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
    ?>
    <div class="container">
        <div class="row">        
            <div class="col-md-6">
                <h3>Informations actuelles</h3>
                <style>
                .card {
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                    transition: 0.3s;
                    width: 40%;
                    border-radius: 5px;
                }

                @media screen and (max-width: 600px) {
        .card {
            width: 60%; 
            margin: 5%;
            font-size: 14px;
        }
        .card img {
            height: auto;
        }
    }

                .card:hover {
                    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                }

                .container {
                    padding: 2px 16px;
                }
                </style>
                <div class="card">
                    <div class="container">
                        <img src="<?php echo 'user_photo/'.$row['photo']; ?>" alt="Avatar" style="width:100%; height:100%; object-fit: cover; border-radius: 5px;">
                        <p><b>Nom : <?php echo $row['nom_util']; ?></b></p> 
                        <p><b>Prénom : </b><?php echo $row['prenom_util']; ?></p> 
                        <p><b>Email : </b><?php echo $_SESSION['email']; ?></p> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form  method="POST" action="modif_information_membre.php" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row my-3">
                            <div class="col-md-10">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control " id="nom" name="nom" placeholder="Votre nom..." required>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-10">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control " id="prenom" name="prenom" placeholder="Votre prénom..." required>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-10">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control " id="email" name="email" placeholder="Votre email..." required>
                            </div>
                        </div>

                        <div class="col-md-10">
                        <label for="formFile" class="form-label">Ajout de photos</label>
                        <input class="form-control" name="userfile" type="file" id="formFile" >
                        </div>

                        <div class="row my-3">
                            <div class="d-grid gap-2 d-md-block confirmation"><button class="btn btn-outline-danger" type="submit" name="modifier">Modifier</button></div>   
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
