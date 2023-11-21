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
        echo "<script>alert('Votre message a été envoyé avec succès. Notre équipe ne va pas tarder à vous répondre.');</script>";
    } else {
        echo "<script>alert('Une erreur s'est produite lors de l'envoi de votre message.');</script>";
    }
} else {
    echo "
    <script>
        window.location.href='contactus.php';
        alert('Le formulaire n'a pas été soumis correctement. Merci de réessayer ultérieurement.'); 
    </script>";
}
?>