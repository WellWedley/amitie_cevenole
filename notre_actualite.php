<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include_once './head.php'
    ?>
</head>

<body>

    <?php
    include_once './header.php'
    ?>
    <div class="actu_sejours">
        <h1 class="titre_slider"> NOS DERNIERS SÉJOURS EN IMAGES :</h1>
    </div>
    <div class="previous_wrapper" id="previous_wrapper">
        <img class="arrow previous_arrow" src="img/logo/previous.png" alt="Diapositive précédente">
    </div>
    <div id="slider">
        <div class="gallery_wrapper" id="gallery_wrapper">
        </div>

    </div>
    <!-- <div id="play_pause">

        <img class="play" src="./img/logo/play.png" alt="Jouer le diaporama">
        <img class="pause" src="./img/logo/pause.png" alt="Arrêter le diaporama">
    </div> -->
        <div class="next_wrapper" id="next_wrapper">
            <img class="arrow next_arrow" src="img/logo/next.png" alt="Diapositive suivante">
        </div>

        <div class="actu_wrapper">
            <div class="feed_fb">
                <h1 class="feed_title"> À VOIR SUR FACEBOOK </h1>
                <div class="feed_fb_content">
                    <iframe id="facebook_iframe" class="facebook_iframe"></iframe>
                </div>
                <div class="fb_actu_link_container">
                    <a class="fb_actu_link" href="https://www.facebook.com/amitiecevenole" target="_blank">
                        <img class="fb_actu_img" src="img/logo/fb.svg" alt="Lien facebook de l'association Amitié Cévenole">
                        <div>
                            <p class="text_fb">Amitié Cévenole - Officiel</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="sejours_en_cours">
                <h1 class="en_cours_1_title">VOIR LES SÉJOURS EN COURS </h1>
                <div class="en_cours_1">
                    <div class="wrap_button1">
                        <button class="modal_1_button" id="modal_opener">Explor'Ados</button>
                    </div>

                    <div class="en_cours_wrap_img1">
                        <img class="en_cours_img" src="./img/couverture_séjours/explor_ados.jpg" alt="Photo de couverture du séjour Explor'Ados">
                    </div>
                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1> Cette fonctionnalité sera disponible durant les séjours cet été !</h1>
                        </div>
                    </div>
                </div>
                <div class="en_cours_2">
                    <div class="wrap_button2">
                        <button class="modal_2_button" id="modal_opener">Cévennes Explor'</button>
                    </div>

                    <div class="en_cours_wrap_img3">
                        <img class="en_cours_img" src="./img/couverture_séjours/cevennes.jpeg" alt="Photo de couverture du séjour Cévennes Explor'">
                    </div>
                </div>
                <div class="en_cours_3">
                    <div class="wrap_button3">
                        <button class="modal_3_button">Graines de fermiers</button>
                    </div>

                    <div class="en_cours_wrap_img3">
                        <img class="en_cours_img" src="./img/couverture_séjours/graine_fermier.jpeg" alt="Photo de couverture du séjour Graines de fermier">
                    </div>
                </div>
            </div>
        </div>

        <script src="js/slider.js"></script>
        <script src="js/modalTrigger.js"></script>
        <script defer src="js/facebookResizer.js" defer></script>
        <?php include 'footer.php' ?>

</body>

</html>