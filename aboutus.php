<?php
    session_start();
    $titre = "About Us";
    include 'header.inc.php';
    include 'menu.inc.php';
?>

<style>
      .homepage-container {
        position: relative;
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

<div class="container">
    <h1>About us !</h1>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>
    <p>Bla bla bla...</p>

</div>
<?php
    include 'footer.inc.php';
?>