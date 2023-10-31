<?php
    session_start();
    $titre = "Accueil";
    include 'header.inc.php';
    include 'menu.inc.php';


?>


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
<<<<<<< HEAD
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
=======
<!--
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="#" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="#" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="#" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
>>>>>>> cceddc702de5b9405d2452e9a740856195667279

<hr style="width: 100%; border: none; height: 2px; background: #990000; margin: 0;">
-->
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Jeu</th>
                    <th scope="col">Photo</th>
                </tr>
            </thead>
            <tbody>                  

                <?php
                $mysqli = mysqli_connect("localhost","root","root","tp");
                /*
                // Connexion :
                require_once("param.inc.php");
                $mysqli = new mysqli($host, $login, $passwd, $dbname);*/
                if ($mysqli->connect_error) {
                    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                            . $mysqli->connect_error);
                }

                if ($stmt = $mysqli->prepare("SELECT nom_jeu, photo_jeu FROM jeu WHERE 1")) 
                {
                    $stmt->execute();
                    $result = $stmt->get_result();   
                    while($row = $result->fetch_assoc()) 
                    {     
                        echo '<tr>';     
                        echo'<td>'.$row['nom_jeu'].'</td>';
                        echo'<td>'.$row['photo_jeu'].'</td>';
                        echo '</tr>';
                    }
                }
                ?>  
            </tbody>
        </table>
    </div>
    
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

    <form  method="POST" action="tt_connexion.php">
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
                <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit">Inscription</button></div>   
            </div>
        </div>
    </form>
</div>
<?php
    include 'footer.inc.php';
?>