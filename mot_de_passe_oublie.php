<?php
session_start();
$titre = "Mot de passe oublié";
include 'header.inc.php';
include 'menu.inc.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire de réinitialisation du mot de passe
    // (Vous devez ajouter votre logique de réinitialisation ici)
    require_once("param.inc.php");
    $mysqli = new mysqli($host, $login, $passwd, $dbname);

    $email = htmlentities($_POST['email']);

    // Vérifier si l'utilisateur avec cet email existe
    $stmt = $mysqli->prepare("SELECT id_util FROM utilisateur WHERE mail_util = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Générer un jeton de réinitialisation (ici, une chaîne aléatoire)
        $token = bin2hex(random_bytes(32));

        // Stocker le jeton dans la base de données avec l'identifiant de l'utilisateur
        $stmt = $mysqli->prepare("UPDATE utilisateur SET reset_token = ? WHERE mail_util = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Envoyer un email de réinitialisation avec le lien contenant le jeton
        $reset_link = "localhost/CSW/reset_mot_de_passe.php?token=$token";
        $message = "Bonjour,\n\nPour réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant :\n$reset_link";
        mail($email, "Réinitialisation du mot de passe", $message);

        // Afficher un message de succès
        $_SESSION['message'] = "Un email de réinitialisation a été envoyé à votre adresse.";
        header("Location: mot_de_passe_oublie.php");
        exit();
    } else {
        // Afficher un message d'erreur si l'utilisateur n'existe pas
        $_SESSION['message'] = "Aucun compte n'est associé à cet email.";
    }
}
?>

<div class="container">
    <!-- ... (votre formulaire HTML) ... -->
</div>

<?php
include 'footer.inc.php';
?>
