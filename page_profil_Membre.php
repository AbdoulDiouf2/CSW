<?php
session_start();
$titre = "Membre";
include 'header.inc.php';
include 'menumembre.php';

?>

<div class="container">
<h1></h1> 

    <h1>Informations Membre</h1> <!-- Le texte au-dessus de la première liste -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>

            <?php
            require_once("param.inc.php");
            $mysqli = mysqli_connect("localhost", "root", $passwd, "tp");

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

    
</div>

<?php
include 'footer.inc.php';
?>