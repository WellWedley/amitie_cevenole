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
            <h2> Explor' Ados : Du 10 au 17 Juillet 2021 </h2>
            <div class="close_flight_travelDl">
                <a id="close_flight_travelDl" href="#sejour_en_cours">
                    <div class="close_logo">
                        <p>&times;</p>
                    </div>
                    <div class="close_text">
                        <p>Fermer </p>
                    </div>

                </a>
            </div>



            <div class="sejours_sliders_wrap">
                <div class="explor_ados_photos_sejours_wrap">
                    <div class="slider_wrap">
                        <div class="section__item bg-5">
                            <div class="section_img_content first">
                                <h3>Le petit mot du jour (Dimanche) : </h3>
                                <p>Nous sommes bien arrivés à Mons. La première baignade s'est bien déroulée. On en a bien profité. Ce soir nous faisons une capture de drapeaux, et ça court de partout sur le camp ! </p>
                                <p>À bientôt !</p>
                            </div>
                        </div>

                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.07.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.08(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.08(2).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.08.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.09(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.09(2).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.09(3).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.09.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.10(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.10(2).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.10(3).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.10.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.11(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.11.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/02_Dimanche/16.32.06.jpeg" alt="">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_154544-min.jpg" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_154554-min.jpg" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_160756-min.jpg" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_160802-min.jpg" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_160811-min.jpg" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_161801-min.jpg" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_163142-min.jpg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/IMG_20210710_182633-min.jpg" alt="">
                        </div>
                        
                      
                    </div>
                    <!-- <h2> Explor' Ados : Du 17 au 24 Juillet 2021 </h2>

                    <div class="slider_wrap">
                         <div class="section__item bg-5">
                            <div class="section_img_content first">
                                <h3>Le petit mot du jour (Dimanche) : </h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti, nemo perspiciatis. Corporis eius libero voluptas placeat illum aspernatur repellat, aperiam labore. Illo modi animi ea, maiores eius obcaecati iste impedit?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quas numquam vitae necessitatibus, quidem delectus eligendi! Consectetur error eius nostrum quas possimus neque quidem consequatur porro dolorem omnis. Provident, nam.</p>
                            </div>
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="">

                        </div>
                    </div>
                    <h2> Explor' Ados : Du 24 au 31 Juillet 2021 </h2>

                    <div class="slider_wrap">
                         <div class="section__item bg-5">
                            <div class="section_img_content first">
                                <h3>Le petit mot du jour (Dimanche) : </h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti, nemo perspiciatis. Corporis eius libero voluptas placeat illum aspernatur repellat, aperiam labore. Illo modi animi ea, maiores eius obcaecati iste impedit?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quas numquam vitae necessitatibus, quidem delectus eligendi! Consectetur error eius nostrum quas possimus neque quidem consequatur porro dolorem omnis. Provident, nam.</p>
                            </div>
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="">

                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div id="modal_2" class="overlay_flight_traveldil">
        <div class="popup_flight_travlDil">
            <h2 class="slider_title_h2">Cévennes Explor' : Du 10 au 17 Juillet 2021 </h2>
            <a class="close_flight_travelDl" id="close_flight_travelDl" href="#sejour_en_cours">
                <p class="close_text">Fermer </p>
                <p class="close_logo">&times;</p>
            </a>
            <div class="sejours_sliders_wrap">
                <div class="explor_ados_photos_sejours_wrap">
                    <div class="slider_wrap">
                        <div class="section__item bg-5">
                            <div class="section_img_content first">
                                <h3>Le petit mot du jour (Dimanche) : </h3>
                                <p>
                                    Hello tout le monde ! Tout va bien, nous avons passé une super journée. Le camping est génial. On prend nos marques sur le camp avec plein d'activités. </p>
                                <p>À demain pour plein de belles aventures ! ☺️</p>
                            </div>
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.15.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.19.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.23.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.26.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.28(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.28.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.29(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.29.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.30(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.30.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.31(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.31.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.32(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.32.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.33(1).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.33(2).jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/02_Dimanche/18.17.33.jpeg" alt="">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/1.jpeg" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/2.jpeg" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/3.jpeg" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/4.jpeg" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/5.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/6.jpeg" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/7.jpeg" alt="">

                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/8.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/9.jpeg" alt="">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Cevennes_Explor/Du_10_au_17_Juillet_2021/01_Samedi/10.jpeg" alt="">
                        </div>
                       
                    </div>
                    <!-- <h2 class="slider_title_h2">Cévennes Explor' : Du 17 au 24 Juillet 2021 </h2>

                    <div class="slider_wrap">
                         <div class="section__item bg-5">
                            <div class="section_img_content first">
                                <h3>Le petit mot du jour (Dimanche) : </h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti, nemo perspiciatis. Corporis eius libero voluptas placeat illum aspernatur repellat, aperiam labore. Illo modi animi ea, maiores eius obcaecati iste impedit?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quas numquam vitae necessitatibus, quidem delectus eligendi! Consectetur error eius nostrum quas possimus neque quidem consequatur porro dolorem omnis. Provident, nam.</p>
                            </div>
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="ZFZEF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="FZEZF">
                        </div>
                        <div class="section__item bg-5">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="ZEFZF">
                        </div>
                        <div class="section__item bg-1">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="DAZD">
                        </div>
                        <div class="section__item bg-2">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="AZD">
                        </div>
                        <div class="section__item bg-3">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="AZD">
                        </div>
                        <div class="section__item bg-4">
                            <img class="section_img_content" src="./img/sliders/Explor_Ados/01_Samedi/" alt="">

                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


    <div id="modal_3" class="overlay_flight_traveldil">
        <div class="popup_flight_travlDil">
            <h2 class="slider_title_h2">Graines d'explorateurs : Du 17 au 24 Juillet 2021 </h2>
            <a class="close_flight_travelDl" id="close_flight_travelDl" href="#sejour_en_cours">
                <p class="close_text">Fermer </p>
                <p class="close_logo">&times;</p>
            </a>
            <div class="explor_ados_photos_sejours_wrap">
                <!-- Slider contenant les photos et les textes des enfants.  -->
                <div class="slider_wrap">
                    <div class="section__item bg-5">
                        <div class="section_img_content first">
                            <h3>Le petit mot du jour (Dimanche) : </h3>
                            <p>
                                Nous sommes bien arrivés à Mons La Trivalle. La première baignade s'est bien déroulée. On en a bien profité. Ce soir nous faisons une balle américaine, et ça court de partout sur le camp ! </p>
                            <p>À demain !</p>
                        </div>
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.17(1).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.17(2).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.17(3).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.17.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.18(1).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.18(2).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.18(3).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.18.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.19(1).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.19(2).jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.19.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/02_Dimanche/14.09.16.jpeg" alt="AZD">
                    </div>

                    <div class="section__item bg-1">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/1.jpeg" alt="DAZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/2.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/3.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/4.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/5.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/6.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/7.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/8.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/9.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/10.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/11.jpeg" alt="AZD">
                    </div>
                    <div class="section__item bg-2">
                        <img class="section_img_content" src="./img/sliders/Graines_explorateurs/01_Samedi/12.jpeg" alt="AZD">
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