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
<!--
        <li class="nav-item">
          <a class="nav-link" href="page.php">Une page</a>
        </li>
-->
      </ul>
      
      <form class="d-flex" role="search">
        <input class="form-control me-2 bg-danger" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" style="--bs-bg-opacity: .5;" type="submit">Search</button>
      </form>
      <style>
        .btn-outline-success {
          --bs-btn-color: #f8f9fa;
          --bs-btn-border-color: #dc3545;
          --bs-btn-hover-color: #fff;
          --bs-btn-hover-bg: #e02537;
          --bs-btn-hover-border-color: #dc3545;
          --bs-btn-focus-shadow-rgb: 25,135,84;
          --bs-btn-active-color: #fff;
          --bs-btn-active-bg: #dc3545;
          --bs-btn-active-border-color: #dc3545;
          --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
          --bs-btn-disabled-color: #dc3545;
          --bs-btn-disabled-bg: transparent;
          --bs-btn-disabled-border-color: #dc3545;
          --bs-gradient: none;
        }
      </style>
    

      <ul class="navbar-nav mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active"  href="contactus.php">Contactez Nous</a>
        </li>
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
                <a class="nav-link active" href="inscription.php">Inscription</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active btn btn-danger" href="connexion.php">Connexion</a>
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

<style>
      .homepage-container {
        position: relative;
        min-height: 100vh;
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