<?php
session_start();
$titre = "Réinitialisation du mot de passe";
include 'header.inc.php';
include 'menu.inc.php';

// Vérifier si le jeton est présent dans l'URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Afficher le formulaire de réinitialisation du mot de passe
    echo '<div class="container">';
    echo '<br><br>';
    echo '<h1 style="color: #FF6666;">Réinitialisation du mot de passe</h1>';
    echo '<br>';

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Traitement du formulaire de réinitialisation du mot de passe
        // (Vous devez ajouter votre logique de réinitialisation ici)
        require_once("param.inc.php");
        $mysqli = new mysqli($host, $login, $passwd, $dbname);

        $password = password_hash(htmlentities($_POST['password']), PASSWORD_BCRYPT);

        // Mettre à jour le mot de passe dans la base de données
        $stmt = $mysqli->prepare("UPDATE utilisateur SET mdp_util = ?, reset_token = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $password, $token);
        $stmt->execute();

        // Afficher un message de succès
        $_SESSION['message'] = "Votre mot de passe a été réinitialisé avec succès.";
        header("Location: connexion.php");
        exit();
    }

    // Afficher le formulaire de réinitialisation du mot de passe
    echo '<form method="POST" action="reset_mot_de_passe.php?token=' . $token . '">';
    echo '<div class="container">';
    echo '<div class="row my-3">';
    echo '<div class="col-md-6">';
    echo '<label for="password" class="form-label">Nouveau mot de passe</label>';
    echo '<input type="password" class="form-control" id="password" name="password" placeholder="Votre nouveau mot de passe..." required>';
    echo '</div>';
    echo '</div>';
    echo '<div class="row my-3">';
    echo '<div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-danger" type="submit">Réinitialiser le mot de passe</button></div>';
    echo '</div>';
    echo '</div>';
    echo '</form>';

    echo '<br>';
    echo '</div>';
} else {
    // Rediriger si le jeton n'est pas présent
    header("Location: connexion.php");
    exit();
}

include 'footer.inc.php';
?>
