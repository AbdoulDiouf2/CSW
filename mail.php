<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Adresse e-mail de destination
    $to = "aad.mbacke691@gmail.com";

    // Sujet de l'e-mail
    $email_subject = "Nouveau message de $name : $subject";

    // Corps de l'e-mail
    $email_body = "Nom : $name\n";
    $email_body .= "Email : $email\n";
    $email_body .= "Message :\n$message";

    // Entêtes de l'e-mail
    $headers = "From: $email";

    // Envoyer l'e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de votre message.";
    }
} else {
    // Rediriger si le formulaire n'a pas été soumis
    header("Location: contactus.php");
}
?>
