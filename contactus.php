<?php
    session_start();
    $titre = "About Us";
    include 'header.inc.php';
    include 'menu.inc.php';
?>

<div class="container flex-grow-1">

    <section class="mb-4">


        <h2 class="h1-responsive font-weight-bold text-center my-4" style="color: #FF6666; font-size: 50px; font-family: Handlee; font-weight: 400; word-wrap: break-word">Contactez Nous !</h2>

        <p class="text-center w-responsive mx-auto mb-5">
            Avez-vous des questions? N'hésitez pas à nous contacter directement. Notre équipe reviendra vers vous dans quelques heures pour vous aider.
        </p>

        <div class="row">

            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Your email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Your message</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>

                        </div>
                    </div>

                </form>
                <br>
                <div class="text-center text-md-left">
                    <a class="btn btn-danger" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>


            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>ROUEN, Saint-Etienne-Du-Rouvray 76800, France</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+33 - 7 - 49 - 05 - 18 - 79</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>abdoul.diouf2@groupe-esigelec.org</p>
                        <p>valentin.deslandes@groupe-esigelec.org</p>
                    </li>
                </ul>
            </div>

        </div>

    </section>

</div>
<?php
    include 'footer.inc.php';
?>