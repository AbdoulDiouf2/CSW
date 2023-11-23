<?php
session_start();
session_destroy();
unset($_SESSION['isAdmin']);
unset($_SESSION['isMembre']);
session_start();
$_SESSION['logOutMessage'] = "Déconnexion réussie!";

header("location:connexion.php");
?>