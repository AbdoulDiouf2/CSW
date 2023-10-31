<?php
    session_start();
    if(!(isset($_SESSION['PROFILE'])))
        header("location:connexion.php");
    if(!($_SESSION['PROFILE']["role"]==2))
        header("location:index.php");
?>