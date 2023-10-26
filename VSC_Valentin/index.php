<?php
    session_start();
    $titre = "Accueil";
    include 'header.inc.php';
    include 'menu.inc.php';


?>


<div class="container">


<?php
    if(isset($_SESSION['message'])) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo $_SESSION['message'];
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        unset($_SESSION['message']);
    }
    ?>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>
        <h1>Accueil</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto magni eius, accusamus nesciunt illum voluptas ut doloremque hic at excepturi tempore harum commodi incidunt? Doloremque alias, dicta ex voluptas nemo quas exercitationem eum illum minus rem! Ut repudiandae illum, deserunt cupiditate dignissimos quod quae modi mollitia, ipsa eligendi placeat iure, optio enim accusamus voluptate. Facere eaque error numquam illum unde?</p>

</div>
<?php
    include 'footer.inc.php';
?>