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

<style>
    @font-face {
        font-family: 'Poppins';
        src: url('/fonts/poppins/Poppins-ExtraBold.ttf') format('truetype');
    }
    .code_erreur{
        font-family: 'Poppins' ;
        position: relative; top: 15vw;
        text-align: center;
        padding: 5vw;
        color: white;
        background: linear-gradient(25deg, rgba(165, 215, 213, 1) 0%, rgba(170, 207, 213, 1) 18.55%, rgba(184, 183, 214, 1) 48.04%, rgba(189, 176, 214, 1) 56.04%, rgba(193, 190, 223, 1) 78.94%, rgba(195, 197, 228, 1) 100%);
    }
    .code_erreur h1{
        font-size: 3vw;
    }
    .code_erreur p{
        font-size: 2vw;
    }
    .code_erreur a {
        position: relative;
        text-align: center;
        color: #fff;
        background-color: #054872;
        border-style: none;
        font-family: "Poppins Bold";
        top: 2.4vw;
        font-size: 1.6vw;
        padding: 0 1.3vw;
        box-shadow: 0px 4px 3px 0px rgba(54, 77, 92, 0.19);
    }
    footer{
        top: 40vw;
    }
</style>
<div class="code_erreur">
    <h1> ERREUR 404...</h1>
    <p> Impossible de trouver la ressource demandée, il se peut qu'elle ai été déplacée, ou bien supprimée.</p>
    <a href="/index.php"> Retourner à l'accueil</a>
</div>


<?php include './footer.php' ?>
</body>

</html>