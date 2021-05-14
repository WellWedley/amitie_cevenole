<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include_once './head.php'
    ?>
</head>


<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5785GBW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
    include_once './header.php'
    ?>
    <div class="a_propos_de_nous">
        <div class="a_propos_1">
            <h1>L’AMITIÉ CÉVENOLE ?</h1>
            <p>
                L’Association d’Éducation Populaire Cévenole est née il y a plus de 60 ans dans les Cévennes.
                À cette époque, pour les « petits cévenols », prendre des couleurs au bord de la Méditerranée relevait de la grande
                expédition ! Depuis, l’activité s’est développée autour de plusieurs séjours et d’un projet éducatif fort.</p>
        </div>
        <div class="a_propos_2">
            <h1>QUI S’EN OCCUPE ?</h1>
            <p>
                Elle est gérée par un Conseil d’Administration composé de 17 membres, épaulés par une équipe de membres actifs
                composée pour partie d’anciens colons, parents ou salariés. Tous bénévoles, ils travaillent ensemble et
                s’investissent pour offrir aux jeunes des séjours agréables et de qualité. </p>
        </div>
    </div>
    <div class="gallery_wrapper">
        <div class="gallery"> <img src="./img/photos_notre_asso/60ans.jpeg" alt="60 ans de l'association Amitié Cévenole"> </div>
        <div class="gallery"> <img src="./img/photos_notre_asso/sejour_valras.jpeg" alt="Photo des enfants qui reviennent de l'activité spéléologie"> </div>
        <div class="gallery"> <img src="./img/photos_notre_asso/photo_grotte.jpeg" alt="Photo de groupe avec les animateurs et les enfants durant le séjour à Valras"> </div>
    </div>

        <a class="tel_projet" href="./files/projet_educatif/projet_educatif.pdf" target="_blank">Consulter le projet éducatif / finalités</a>


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

                    <a href="./files/catalogues/graines_explorateur.pdf" target="_blank">Graines  d'explorateur 8-11 ans</a>
                </li>
                <li>

                    <a href="./files/catalogues/graines_fermier.pdf" target="_blank">Graines de Fermier 8-11 ans</a>
                </li>
            </div>
            <a class="detail_sejour" href="./nos_sejours.php" >Voir le détail des séjours</a>

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
                    <a class="courrier" href="https://g.page/amitiecevenole?share">2 Rue Ernest Castan, 34090 Montpellier</a>
                </div>
                <a class="detail_inscription" href="./inscriptions.php"> En savoir plus sur l'inscription </a>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>