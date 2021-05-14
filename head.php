
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html" />
<!-- <meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache, must-revalidate">
<meta http-equiv="imagetoolbar" content="no" /> -->
<link rel="shortcut icon" href="./img/favico/logo_amitie_cevenole1.ico" type=“image/x-icon”>
<link rel="stylesheet" href="./styles/styles.css" />


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5785GBW');</script>
<!-- End Google Tag Manager -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-38327519-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-38327519-1');
</script>


<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
$nomPublic = '';
if ($curPageName == 'index.php') {
    echo '<link rel="stylesheet"  href="./styles/styles.css"/>';
    $nomPublic = "Accueil ";
} else if ($curPageName == 'notre_asso.php') {
    echo '<link rel="stylesheet"  href="./styles/style_notre_asso.css"/>';
    $nomPublic = "Notre asso ";
} else if ($curPageName == 'nos_sejours.php') {
    echo '<link rel="stylesheet"  href="./styles/style_nos_sejours.css"/>';
    $nomPublic = "Nos séjours ";
} else if ($curPageName == 'inscriptions.php') {
    echo '<link rel="stylesheet"  href="./styles/style_inscriptions.css"/>';
    $nomPublic = "S'inscrire à un séjour ";
} else if ($curPageName == 'notre_actualite.php') {
    echo '<link rel="stylesheet"  href="./styles/style_notre_actualite.css"/>';
    $nomPublic = "Notre actualité ";
} else if ($curPageName == 'contact.php') {
    echo '<link rel="stylesheet"  href="./styles/style_contact.css"/>';
    $nomPublic = "Contact ";
} else if ($curPageName == 'mentions-legales.php') {
    echo '<link rel="stylesheet"  href="./styles/style_contact.css"/>';
    echo '<link rel="stylesheet"  href="./styles/mentions.css"/>';
    $nomPublic = "Mention légales ";
}
?>
<title>
    <?php
    echo $nomPublic;
    ?> | Amitié Cévenole</title>