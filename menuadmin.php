<nav class="navbar navbar-expand-md border-body custom-bg-admin" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Accueil</a>
        </li>
        </ul>
        <ul class="navbar-nav me-auto mb-lg-2">
          <li class="nav-item">
            <a class="nav-link" href="list.php">Liste Utilisateur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page_ajout_date.php">Proposition Date</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listCreneaux.php">Gestion Créneaux</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page_ProfilAdmin.php">Mon profil</a>
          </li>
          </ul>
      
      <ul class="navbar-nav mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Déconnexion</a>
        </li>

      </ul>

    </div>
  </div>
</nav>
<style>
      .custom-bg-admin {
        background-color: #ff6666;
      }

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