<?php
session_start();
$titre = "Administrateur";
include 'header.inc.php';
include 'menuadmin.php';
if (!isset($_SESSION['email']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou une page d'erreur
    header("Location: tt_connexion.php"); // Remplacez ceci par l'URL de votre page de connexion
    exit();
}
?>
<div style="width: 200px; height: 100px; margin : auto;">

</div>

<div class="container flex-grow-1">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="admin.php">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="list.php">Liste Utilisateur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Gestion_des_jeux.php">Gestion des jeux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="page_ajout_date.php">Proposition Date</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="listCreneaux.php">Gestion Créneaux</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active disabled" aria-disabled="true" aria-current="page">Mon Profil</a>
  </li>  
<!--  
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
  </li>
  -->
</ul>
<br><br>

<div style="width: 200px; height: 100px; margin : auto;">
    <a class="btn btn-danger" href="page_ajout_admin.php" role="button">Ajouter un profil Administrateur</a>

</div>
    <h1>Informations Admin</h1> 
    <?php
      require_once("param.inc.php");
      $mysqli = mysqli_connect($host,$login,$passwd,$dbname);
      $stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE mail_util = ?");
      $stmt->bind_param("s", $_SESSION['email']);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
    ?>
    <!--
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>

            <php
            require_once("param.inc.php");
            $mysqli = mysqli_connect($host,$login,$passwd,$dbname);

            if ($stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE mail_util = ?")) {
                $stmt->bind_param("s", $_SESSION['email']);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                echo '<tr>';
                echo '<td>' . $row['nom_util'] . '</td>';
                echo '<td>' . $row['prenom_util'] . '</td>';
                echo '<td>' . $_SESSION['email'] . '</td>';
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>
          -->
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 20%;
            border-radius: 5px;
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
        <a class="btn btn-outline-danger" href="page_modif_information.php?modif=<?php echo $_SESSION['email']; ?>" role="button">Modifier mes informations</a>
      </div>
    </div>
    <br>
    <h1>Liste des parties que vous avez créées :</h1> <!-- Le texte au-dessus de la deuxième liste -->

    <table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom du jeu</th>
        <th scope="col">date du jeu</th>
        <th scope="col"></th>

    </tr>
  </thead>
  <tbody>

  <?php


$i=1;
if ($stmt = $mysqli->prepare("SELECT * FROM creationjeu WHERE id_utilJeu = ?")) 
{
  $stmt->bind_param("i", $row['id_util'] );
  $stmt->execute();
  $result = $stmt->get_result();   
  while($row = $result->fetch_assoc()) 
  {     
    $stmt2 = $mysqli->prepare("SELECT nom_jeu FROM jeu WHERE id_jeu = ?");
    $stmt2->bind_param("i", $row['id_jeu']);
    $stmt2->execute();
    $stmt2->bind_result($nomJeu);
    $stmt2->fetch();
    $stmt2->close();
    echo '<tr>';     
    echo  '<th scope="row">'.$i.'</th>';
    echo'<td>'.$nomJeu.'</td>';
    echo'<td>'.$row['date_Jeu'].'</td>';
    echo'<td><a class="btn btn-danger confirmation" href="delete_Date.php?id_CreaJeu='.$i.'" role="button">Delete</a></td>';
    echo '</tr>';
$i++;   
}
}
?>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>

</tbody>

</table>
</div>

<?php
include 'footer.admin.php';
?>