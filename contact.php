<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include_once './head.php'
    ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body>
<?php
include_once './header.php'
?>


<div class="contact_title_wrap">
    <h1 class="contact_title"> N'HÉSITEZ PAS À NOUS CONTACTER ! </h1>
</div>
<form action="./contact-form-send.php" method="POST" class="form_content">
    <div class="contact_wrapper">
        <div class="first_line_wrapper">
            <div>
                <input placeholder="Nom" type="text"  class="nom_input" name="nom_input" required>
            </div>
            <div>
                <input placeholder="Prénom" type="text" class="prenom_input" name="prenom_input" required>
            </div>
        </div>
        <div class="second_line_wrapper">
            <input placeholder="Email" type="text" class="email_input" name="email_input" required>
        </div>
        <div class="third_line_wrapper">
            <input placeholder="Objet" type="text" class="object_input" name="object_input" required>

        </div>
        <div class="fourth_line_wrapper">
            <textarea placeholder="Message" class="message_input" name="message_input" required></textarea>
        </div>
        <div class="messageError"> </div>
        <!-- <div class="last_wrapper"> -->
        <input onclick="checkForm()" type="submit" value="Envoyer le message" class="send_message g-recaptcha" name="send_message" id="demande_contact" data-sitekey="6LfxK6caAAAAABf4w-_Yzb002TxwKtTaUXEk69rO" data-callback='onSubmit' data-action='submit'>
        <!-- </div> -->
    </div>
</form>
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
                <a class="courrier" href="https://g.page/amitiecevenole?share">2 Rue Ernest Castan, 34090 Montpellier</a>
            </div>
            <a class="detail_inscription" href="./inscriptions.php"> En savoir plus sur l'inscription </a>
        </div>
    </div>
</div>
<script src="js/checkForm.js">
</script>

<?php include_once 'footer.php' ?>
</body>

</html>