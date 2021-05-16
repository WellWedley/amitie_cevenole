<<<<<<< HEAD

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html" />
<meta name="description" content="Site de l'Association d'Éducation Populaire Amitié cévenole ( AEPC ) , une association  faisaint partir les enfants de 8 à 17 ans en colonies de vacances en bord de mer, abords de rivière, à la ferme... Association basée à Montpellier. ">
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
<!--END  Global site tag (gtag.js) -->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '488025752252239');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=488025752252239&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<?php
 // FUNCTION TO ADD TITLE TO PAGES, LOAD STYLES ETC ACCORDING TO PAGE NAME
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
$nomPublic = '';
if ($curPageName == 'index.php') {
    echo '<link rel="stylesheet"  href="./styles/styles.css"/>';
    $nomPublic = "Accueil ";
} else if ($curPageName == 'notre_asso.php') 
{
    echo '<link rel="stylesheet"  href="./styles/style_notre_asso.css"/>';
    $nomPublic = "Notre asso ";
} else if ($curPageName == 'nos_sejours.php') 
{
    echo '<link rel="stylesheet"  href="./styles/style_nos_sejours.css"/>';
    $nomPublic = "Nos séjours ";
} else if ($curPageName == 'inscriptions.php') 
{
    echo '<link rel="stylesheet"  href="./styles/style_inscriptions.css"/>';
    $nomPublic = "S'inscrire à un séjour ";
} else if ($curPageName == 'notre_actualite.php') 
{
    echo '<link rel="stylesheet"  href="./styles/style_notre_actualite.css"/>';
    $nomPublic = "Notre actualité ";
} else if ($curPageName == 'contact.php') 
{
    echo '<link rel="stylesheet"  href="./styles/style_contact.css"/>';
    $nomPublic = "Contact ";
} else if ($curPageName == 'login.php') 
{
    echo '<link rel="stylesheet"  href="./styles/login.css"/>';
    $nomPublic = "Connexion ";
} else if ($curPageName == 'main_backoffice.php') 
{
    echo '<link rel="stylesheet"  href="./styles/main_back.css"/>';
    $nomPublic = "Mon BackOffice ";
} 
    
else if ($curPageName == 'mentions-legales.php') 
{
    echo '<link rel="stylesheet"  href="./styles/style_contact.css"/>';
    echo '<link rel="stylesheet"  href="./styles/mentions.css"/>';
    $nomPublic = "Mention légales ";
}
?>
<title>
    <?php
    echo $nomPublic;
    ?> | Amitié Cévenole</title>
=======
<head>


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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
    <!-- JS DE L'ANCIEN SITE  -->
    <!-- <script type="text/javascript" src="./jscript/lib/mootools-1.2.3-core-nc.js"></script>
    <script type="text/javascript" src="./jscript/lib/mootools-1.2.3-more-nc.js"></script>
    <script type="text/javascript" src="./jscript/lib/functions.js"></script> -->
    <!-- <script type="text/javascript" src="./backoffice/jscript/backoffice.js"></script> -->

    <script type="text/javascript" src="./backoffice/ckeditor/ckeditor.js"></script>
    <!-- <script type="text/javascript" src="./backoffice/ckeditor/adapters/mootools.js"></script> -->
    <script type="text/javascript">
     
    </script>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache, must-revalidate">
    <meta http-equiv="imagetoolbar" content="no" />
    <link rel="shortcut icon" href="./img/favico/logo_amitie_cevenole1.ico" type=“image/x-icon”>
    <link rel="stylesheet"  href="./styles/styles.css"/>
    <!-- Additional CSS-->
    <?php
    $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    $nomPublic = '';
    if ($curPageName == 'index.php') {
        echo '<link rel="stylesheet"  href="./styles/index.css"/>';
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
    } else if ($curPageName == 'mentions-légales.php') {
        echo '<link rel="stylesheet"  href="./styles/style_contact.css"/>';
        echo '<link rel="stylesheet"  href="./styles/mentions.css"/>';
        $nomPublic = "Mention légales ";
    }
    ?>
    <title> <?php
            echo $nomPublic;
            ?> | Amitié Cévenole</title>
</head>
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
