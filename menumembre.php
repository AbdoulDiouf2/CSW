<nav class="navbar navbar-expand-md border-body custom-bg-membre" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="membre.php">Membre</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="membre.php">Accueil</a>
        </li>
        </ul>
        <ul class="navbar-nav me-auto mb-lg-2">
          <li class="nav-item">
            <a class="nav-link" href="liste_jeux_membre.php">Tous les Jeux disponibles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="comming_parts.php">Partie à venir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="historique_jeu.php">Historique des jeux joués</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page_profil_Membre.php">Mon profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page_messages_Membre.php">Mes messages</a>
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
      .custom-bg-membre {
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