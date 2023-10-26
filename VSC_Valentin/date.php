<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier exemple en PHP</title>
</head>
<body>
<?php
    if(isset($_SESSION['message'])) {
      
      
        echo "<p> Password1:".$_SESSION['message']."</p>\n";
        unset($_SESSION['message']);
    }else 
    { echo "<p> No Msg</p>\n";  }
    ?>

 
 <?php   
  $options = [
    'cost' => 12,
];

$password = password_hash("Password1", PASSWORD_BCRYPT, $options);
echo "<p> Password1:".$password."</p>\n";
$password = password_hash("Password2", PASSWORD_BCRYPT, $options);
echo "<p>Password2:".$password."</p>\n";
$password = password_hash("Password3", PASSWORD_BCRYPT, $options);
echo "<p>Password3: ".$password."</p>\n";



 /*
 echo "<p>Bonjour en PHP</p>\n";
 $maintenant=new DateTime();
echo "<p>Nous sommes le ".$maintenant->format('d/m/Y')."</p>\n";//.
echo "<p>Il est ".$maintenant->format('H/i/s')."</p>\n";
*/

?>
    </body>
</html>
