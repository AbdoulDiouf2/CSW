<nav class="navbar navbar-expand-md custom-bg border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <img src="images/logo.png" alt="Bootstrap" width="70" height="55">
    </a>
    <a class="navbar-brand" href="index.php">ESIG'PLAY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page.php">Une page</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="aboutus.php">A Propos</a>
        </li>
<<<<<<< HEAD
=======
        
>>>>>>> e075bc3bfd6dc18536d7af53d4e020db99a292b8
        <?php
        if ((isset($_SESSION['PROFILE'])))
        {
        $nom=$_SESSION['PROFILE']['nom'];
        echo'<li class="nav-item>';
        echo'<a class="nav-link" href="chez.php">Chez '.$nom.'</a>';
        echo'</li>';
        }
        ?>

      </ul>
      <?php
      if(!(isset($_SESSION['PROFILE'])))
      {
        echo'<ul class="navbar-nav mb-lg-o">
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
            </ul>';

      }
      else {
        echo '<ul class="navbar-nav mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Deconnexion</a>
          </li>
        
        </ul>';
      }
      ?>

    </div>
  </div>
</nav>