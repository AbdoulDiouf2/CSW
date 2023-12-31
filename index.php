<?php
    session_start();
    $titre = "Accueil";
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


    <?php
        if(isset($_SESSION['message'])) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $_SESSION['message'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['message']);
        }
    ?>
<!-- ************************************************************************ 

Carousel emplacement

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
 ******************************************************************************************************** -->


    <div style="width: 100%; height: 100%; text-align: center">
        <span style="color: #990000; font-size: 75px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Bienvenue sur</span>
        <span style="color: black; font-size: 75px; font-family: Handlee; font-weight: 400; word-wrap: break-word"> <br/></span>
        <span style="color: #FF6666; font-size: 75px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Esig’Play - Votre Portail de Jeux de <br/>Plateau</span>
    </div>

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
    <div class="container">
        <div class="row my-3">
            <div class="row">
                <div class="col-md-6">
                    <div style="width: 100%; height: 100%; color: black; font-size: 55px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                        Jouez, Partagez et<br/>Connectez-vous à<br/>l’Association de<br/>Jeux Esigelec !!!
                    </div>
                </div>
                <div class="col-md-6">
                    <img style="width: 75%; height: auto; box-shadow: 6px 4px -1px rgba(0, 0, 0, 0.25)" src="images/ludo.png" />
                </div>
            </div>
        </div>
    </div>

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
    <div class="container">
        <div class="row my-3">
            <div class="row">
                <div class="col-md-6">
                    <img style="width: 70%; height: auto; box-shadow: 6px 4px -1px rgba(0, 0, 0, 0.25)" src="images/plateau.png" />
                </div>
                <div class="col-md-6">
                    <div style="width: 100%; height: 100%; color: black; font-size: 55px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                        Votre destination en<br/>ligne pour une<br/>expérience de jeu de <br/>plateau immersive.
                    </div>
                </div>
            </div>
        </div>
    </div>

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
    <div class="container">
        <div class="row my-3">
            <div class="row">
                <div class="col-md-12 text-center" style="width: 100%; height: auto; color: black; font-size: 60px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                    <span style="color: #FF6666; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                        Présentation of Board Games !!!
                    </span>
                </div>
                <div class="col-md-12 ratio ratio-21x9">
                    <video controls>
                        <source src="videos/jeu_de_plateau_V1.mp4" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos au format MP4.
                    </video>
                </div>

            </div>
        </div>
    </div>

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
    <div class="container">
        <div class="row my-3">
            <div class="row">
                <div class="col-md-12 text-center" style="width: 100%; height: auto; color: black; font-size: 55px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                    Notre site est conçu pour rassembler les membres<br/>
                    de l’association de jeux Esigelec, ainsi que tous les<br/>
                    passionnés de jeux de plateau. Découvrez un<br/>
                    univers ludique où vous pouvez jouer, partager et<br/>
                    vous connecter avec d’autres joueurs qui partagent<br/>
                    votre passion.
                </div>                
            </div>
        </div>
    </div>

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">

<div class="container">
    <div class="row my-3">
        <div class="row">
            <div class="col-md-12 text-center" style="width: 100%; height: auto; color: black; font-size: 60px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                <span style="color: #FF6666; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Quelques jeux que nous proposons !!!</span>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        require_once("param.inc.php");
        $mysqli = mysqli_connect($host, $login, $passwd, $dbname);

        if ($mysqli->connect_error) {
            die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        if ($stmt = $mysqli->prepare("SELECT nom_jeu, photo_jeu FROM jeu LIMIT 6")) {
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col">';
                echo '<div class="card h-100">';
                echo '<img src="images/' . $row['photo_jeu'] . '" class="card-img-top custom-img1" alt="' . $row['nom_jeu'] . '"/>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['nom_jeu'] . '</h5>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<small class="text-muted">Last updated 5 days ago</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<style>
    .custom-img1 {
        width: 65%;
        height: 200px; /* Réglez la hauteur souhaitée */
    }

    .table>:not(caption)>*>* {
        padding: 0.5rem 0.5rem;
        color: var(--bs-table-color-state, var(--bs-table-color-type, var(--bs-table-color)));
        background-color: rgba(0, 0, 0, 0);
        border-bottom-width: var(--bs-border-width);
        box-shadow: inset 0 0 0 9999px var(--bs-table-bg-state, var(--bs-table-bg-type, var(--bs-table-accent-bg)));
    }

    td {
        font-size: 50px;
    }
</style>
<br>
<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
    <div class="container">
        <div class="row my-3">
            <div class="row">
                <div class="col-md-12 text-center" style="width: 100%; height: auto; color: black; font-size: 60px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                <span style="color: #FF6666; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Comment ça marche ?</span>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-12" style="width: 100%; height: auto; color: black; font-size: 30px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                    <ol>
                        <li><span style="color: #990000; font-size: 40px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Inscription : </span>
                            Rejoignez notre communauté en créant un compte gratuit. Une fois inscrit, vous deviendrez automatiquement
                            membre de l'association de jeux.
                        </li>
                        <li><span style="color: #990000; font-size: 40px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Découverte : </span> 
                            Explorez notre collection complète de jeux étant membre, lisez les descriptions et trouvez ceux qui vous passionnent.
                        </li>
                        <li><span style="color: #990000; font-size: 40px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Planification : </span> 
                            Consultez les parties à venir et inscrivez-vous pour participer. Vous pouvez également proposer vos propres créneaux de jeu.
                        </li>
                        <li><span style="color: #990000; font-size: 40px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Connexion : </span>
                            Rejoignez une communauté de joueurs enthousiastes, partagez vos stratégies et faites de nouvelles amitiés.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
    <div class="container">
        <div class="row my-3">
            <div class="row">
                <div class="col-md-12 text-center" style="width: 100%; height: auto; color: black; font-size: 60px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                <span style="color: #FF6666; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Rejoignez-Nous !!!</span>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-12" style="width: 100%; height: auto; color: black; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                    Esig'Play est l'endroit où la passion pour les jeux de plateau se transforme en
                    action. Rejoignez-nous aujourd'hui et faites partie d'une communauté de joueurs
                    dévoués.
                </div>                
            </div>
        </div>
    </div>

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
    <div class="container">
        <div class="row my-3">
            <div class="row">
                <div class="col-md-12 text-center" style="width: 100%; height: auto; color: black; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">
                <span style="color: #FF6666; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Créez un compte avec votre adresse mail :</span>
                </div>                
            </div>
        </div>
    </div>

    <form  method="POST" action="tt_inscription.php">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control " id="nom" name="nom" placeholder="Votre nom..." required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <br>
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control " id="prenom" name="prenom" placeholder="Votre prénom..." required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <br>
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" class="form-control " id="email" name="email" placeholder="Votre adresse e-mail..." required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <br>
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control " id="password" name="password" placeholder="Choisissez un mot de passe..." required>
                </div>
            </div>
            <div class="row my-3">
                <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-danger" type="submit">Inscription</button></div>   
            </div>
        </div>
    </form>
</div>
<?php
    include 'footer.inc.php';
?>