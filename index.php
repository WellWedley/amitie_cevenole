<!DOCTYPE html>
<html lang="fr">



<head>
    <?php
    include_once 'head.php';
    ?>
</head>


<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5785GBW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <?php
    include_once './header.php';
    ?>
    <div class="proposition">
        <h1>L'AMITIÉ CÉVENOLE VOUS PROPOSE...</h1>
    </div>
    <div class="intro_content">
        <div id="first_circle">
            <p class="first_content">Des </p>
            <p class="content_align"> vacances</p>
        </div>
        <div id="second_circle">
            <p class="first_content">Pédagogiques</p>
            <p class="content_align"> ludiques</p>
            <p class="content_align">sportives </p>
        </div>

        <div id="third_circle">
            <p class="first_content"> Pour vos </p>
            <p class="content_align"> enfants de </p>
            <p class="content_align"> 8 à 16 ans.</p>
        </div>
    </div>
    <div class="decompte">
        <div class="prochain_depart">
            <h1 style="display: none;">PROCHAIN DÉPART EN SÉJOURS DANS...</h1>
            <h1>Rendez-vous sur <a href="https://www.facebook.com/amitiecevenole" class="facebook_link_index" target="_blank"> Facebook</a> pour de nouvelles aventures !</h1>
        </div>
        <div class="news" style="display: none;">
            <div class="clock jour_diz">
                <h1 id="jours"></h1>
                <p id="daySubt">Jours</p>
            </div>
            <div class="clock heures">
                <h1 id="hours"></h1>
                <p id="hourSubt">Heures</p>
            </div>
            <div class="clock minutes">
                <h1 id="minutes"></h1>
                <p id="minuteSubt">Minutes</p>
            </div>
            <div class="clock secondes">
                <h1 id="secondes"></h1>
                <p id="secondSubt">Secondes</p>
            </div>
        </div>
    </div>

    <div class="nos_sejours">
        <div class="presente_sejours">
            <h3>Nos séjours 2021</h3>
            <div class="list_sejours">
                <li>
                    <a href="./files/catalogues/cevennes_explor.pdf" target="_blank"> Cévennes Explor' 12-16 ans</a>
                </li>
                <li>

                    <a href="./files/catalogues/explor_ados.pdf" target="_blank">Explor' Ados 12-16 ans</a>
                </li>
                <li>

                    <a href="./files/catalogues/graines_explorateur.pdf" target="_blank">Graines d'explorateur 8-11 ans</a>
                </li>
                <li>

                    <a href="./files/catalogues/graines_fermier.pdf" target="_blank">Graines de Fermier 8-11 ans</a>
                </li>
            </div>
            <a class="detail_sejour" href="./nos_sejours.php">Voir le détail des séjours</a>

        </div>

        <div class="inscription_box">
            <div>
                <h3>S'inscrire à un séjour</h3>
                <div class="instruction">
                    <p>Pour celà, il suffit de nous renvoyer le <a href="./files/dossier_inscription/dossier_inscription_2021.pdf" download class="strong_doss"> dossier </a> complet.</p>
                </div>
                <a class="tel_doss" href="./files/dossier_inscription/dossier_inscription_2021.pdf" download>Télécharger le dossier</a>
                <div class="contact_decal">
                    <p class="top_mail">Par mail :</p>
                    <address class="address">
                        <a href="mailto:sejour.aepc@gmail.com">contact@amitiecevenole.com</a>
                    </address>
                    <p class="top_courrier">Par courrier :</p>
                    <a class="courrier" href="https://g.page/amitiecevenole?share" target="_blank">2 Rue Ernest Castan, 34090 Montpellier</a>
                </div>
                <a class="detail_inscription" href="./inscriptions.php"> En savoir plus sur l'inscription </a>
            </div>
        </div>
    </div>
    <div class="footer_perm">
        <h4>Permanences du siège : </h4>
        <div class="perm_list">
            <div>
                <p>Mardi, jeudi : 9h30 à 13h30</p>
            </div>
            <div>
                <p>Mercredi : 10h00 à 13h00 - 14h à 16h30</p>
                
            </div>
        </div>
    </div>

    <script src="./js/countdown_timer.js"></script>
    <script src="./js/script.js"></script>
    <?php include_once 'footer.php' ?>

</body>

</html>