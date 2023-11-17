<?php
session_start();
session_destroy();
unset($_SESSION['isAdmin']);
unset($_SESSION['isMembre']);
header("location:connexion.php");
?>