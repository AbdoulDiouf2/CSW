<?php
    session_start();
    $titre = "Qui sommes-nous";
    include 'header.inc.php';
    include 'menu.inc.php';
?>

<style>
    .homepage-container {
        position: relative;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .homepage-container::before {
        content: "";
        background-image: url('images/background.jpg');
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        opacity: 0.2;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
</style>

<div class="container flex-grow-1">
    <br>
    <h2>Qui sommes-nous</h2>

    <!-- Description Text -->
    <div class="description">
        <p>Insérez votre texte de description ici.</p>
    </div>

    <!-- Cartes avec nom, prénom, fonction et photo -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $membres = array(
            array("Nom2", "Prénom2", "Étudiant", "IMG_9103bis.jpeg"),
            array("Nom3", "Prénom3", "Étudiant", "photo3.jpg")
        );

        foreach ($membres as $membre) {
            echo '<div class="col">';
            echo '<div class="card h-100">';
            echo '<img src="user_photo/' . $membre[3] . '" class="card-img-top" alt="' . $membre[0] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $membre[0] . ' ' . $membre[1] . '</h5>';
            echo '<p class="card-text"><strong>Fonction:</strong> ' . $membre[2] . '</p>';
            // Vous pouvez ajouter d'autres informations ici
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
<br><br>
<?php
    include 'footer.inc.php';
?>
