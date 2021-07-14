<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include_once './head.php'
    ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5785GBW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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


        <div class="sejours_en_cours" id="sejour_en_cours">

            <h1 class="en_cours_1_title">VOIR LES SÉJOURS EN COURS </h1>

            <div class="en_cours_1">
                <div class="wrap_button1">
                    <a href="./explor_ados.php#modal_1" class="modal_1_button" id="modal_opener1">Explor'Ados</a>
                </div>
                <div class="en_cours_wrap_img1">
                    <img class="en_cours_img" src="./img/couverture_sejours/explor_ados.jpg" alt="Photo de couverture du séjour Explor'Ados">
                </div>
            </div>


            <div class="en_cours_2">
                <div class="wrap_button2">
                    <a href="./cevennes_explor.php" class="modal_2_button" id="modal_opener2">Cévennes Explor'</a>
                </div>
                <div class="en_cours_wrap_img2">
                    <img class="en_cours_img" src="./img/couverture_sejours/cevennes.jpeg" alt="Photo de couverture du séjour Cévennes Explor'">
                </div>
            </div>


            <div class="en_cours_3">
                <div class="wrap_button3">
                    <a href="./graines_explorateurs.php#modal_3" class="modal_3_button" id="modal_opener3">Graines d'explorateurs</a>
                </div>

                <div class="en_cours_wrap_img3">
                    <img class="en_cours_img" src="./img/couverture_sejours/graine_fermier.jpeg" alt="Photo de couverture du séjour Graines de fermier">
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