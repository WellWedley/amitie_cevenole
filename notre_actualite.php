<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include_once './head.php'
    ?>
</head>

<body id="body">
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
        <div class="sejours_en_cours" id="sejour_en_cours">
            <h1 class="en_cours_1_title">VOIR LES SÉJOURS EN COURS </h1>
            <div class="en_cours_1">
                <div class="wrap_button1">
                    <a href="#modal_1" class="modal_1_button" id="modal_opener1">Explor'Ados</a>
                </div>

                <div class="en_cours_wrap_img1">
                    <img class="en_cours_img" src="./img/couverture_sejours/explor_ados.jpg" alt="Photo de couverture du séjour Explor'Ados">
                </div>


            </div>
            <div class="en_cours_2">
                <div class="wrap_button2">
                    <a href="#modal_2" class="modal_2_button" id="modal_opener2">Cévennes Explor'</a>
                </div>

                <div class="en_cours_wrap_img2">
                    <img class="en_cours_img" src="./img/couverture_sejours/cevennes.jpeg" alt="Photo de couverture du séjour Cévennes Explor'">
                </div>


            </div>
            <div class="en_cours_3">
                <div class="wrap_button3">
                    <a href="#modal_3" class="modal_3_button" id="modal_opener3">Graines d'explorateurs</a>
                </div>

                <div class="en_cours_wrap_img3">
                    <img class="en_cours_img" src="./img/couverture_sejours/graine_fermier.jpeg" alt="Photo de couverture du séjour Graines de fermier">
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL WINDOWS -->
    <div id="modal_1" class="overlay_flight_traveldil">
        <div class="popup_flight_travlDil">
            <h2>Explor'Ados : Du 10 au 17 Juillet 2021 </h2>
            <a class="close_flight_travelDl" id="close_flight_travelDl" href="#sejour_en_cours">&times;</a>

            <div class="sejours_sliders_wrap">
                <div class="explor_ados_photos_sejours_wrap">
                    <div class="slider_wrap">
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="">

                        </div>
                    </div>
                    <div>
                        <h2>Explor'Ados : Du 17 au 24 Juillet 2021 </h2>
                        <div class="slider_wrap">
                            <div class="section__item bg-5">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZFZEF">
                            </div>
                            <div class="section__item bg-5">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="FZEZF">
                            </div>
                            <div class="section__item bg-5">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZEFZF">
                            </div>
                            <div class="section__item bg-1">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="DAZD">
                            </div>
                            <div class="section__item bg-2">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                            </div>
                            <div class="section__item bg-3">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                            </div>
                            <div class="section__item bg-4">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="">

                            </div>
                        </div>
                    </div>

                    <div>
                        <h2>Explor'Ados : Du 24 au 31 Juillet 2021 </h2>

                        <div class="slider_wrap">
                            <div class="section__item bg-5">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZFZEF">
                            </div>
                            <div class="section__item bg-5">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="FZEZF">
                            </div>
                            <div class="section__item bg-5">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZEFZF">
                            </div>
                            <div class="section__item bg-1">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="DAZD">
                            </div>
                            <div class="section__item bg-2">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                            </div>
                            <div class="section__item bg-3">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                            </div>
                            <div class="section__item bg-4">
                                <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div id="modal_2" class="overlay_flight_traveldil">
        <div class="popup_flight_travlDil">
            <h2>Cévennes Explor' : Du 10 au 17 Juillet 2021 </h2>
            <a class="close_flight_travelDl" id="close_flight_travelDl" href="#sejour_en_cours">&times;</a>
            <div class="sejours_sliders_wrap">
                <div class="explor_ados_photos_sejours_wrap">
                    <div class="slider_wrap">
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="">

                        </div>
                    </div>
                    <!-- <h2>Cévennes Explor' : Du 17 au 24 Juillet 2021 </h2>

                    <div class="slider_wrap">
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="">

                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <div id="modal_3" class="overlay_flight_traveldil">
        <div class="popup_flight_travlDil">
            <h2>Graines d'explorateurs: Du 10 au 17 Juillet 2021 </h2>
            <a class="close_flight_travelDl" id="close_flight_travelDl" href="#sejour_en_cours">&times;</a>
            <div class="sejours_sliders_wrap">
                <div class="explor_ados_photos_sejours_wrap">
                    <div class="slider_wrap">
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/photos_sejours/10.jpeg" alt="">

                        </div>
                    </div>
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