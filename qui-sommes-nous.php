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

    <div class="description">
        <p>Nous sommes deux étudiants de l'ESIGELEC impliqués dans la création d'un site web pour une association de jeux. Notre objectif est de fournir une plateforme conviviale permettant aux membres de choisir les jeux de plateau auxquels ils souhaitent jouer et de planifier des rencontres. Les administrateurs peuvent ajouter de nouveaux jeux et proposer des dates, tandis que les membres peuvent consulter la liste des jeux disponibles, lire les descriptions et règles, et indiquer leur intérêt pour un jeu spécifique.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $membres = array(
            array("DIOUF", "Abdoul Ahad Mbacké", "Étudiant", "user.jpeg"),
            array("DESLANDES", "Valentin", "Étudiant", "user.jpeg")
        );

        foreach ($membres as $membre) {
            echo '<div class="col">';
            echo '<div class="card h-100">';
            echo '<img src="user_photo/' . $membre[3] . '" class="card-img-top" alt="' . $membre[0] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $membre[0] . ' ' . $membre[1] . '</h5>';
            echo '<p class="card-text"><strong>Fonction:</strong> ' . $membre[2] . '</p>';
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
