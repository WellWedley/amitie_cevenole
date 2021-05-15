
<div class="logo_wrap_mobile">
    <a class="logo_mobile" href="./index.php">
        <img src="./img/logo/logo.svg" alt="Logo de l'association Amitie Cevenole">
    </a>
</div>

<div class="horizontal_mobile_bar">
    <div id="menu-burger">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
</div>
<nav class="nav_pc" id="menu">
    <!-- Logo de l'association -->
    <?php 
    if ($curPageName == 'main_backoffice.php') {
        echo '
        <ul>
        <a class="logo" href="./index.php">
            <img src="./img/logo/logo.svg" alt="Logo de l\'association Amitie Cevenole">
        </a>
        <li>
        <p>●</p>
    </li>
        <li>
            <a href="./main_backoffice.php">MON BACKOFFICE</a>
        </li>
        <li>
            <p>●</p>
        </li>
    
    </ul>' ; 
    }
    else{
        echo '
        <ul>
        <a class="logo" href="./index.php">
            <img src="./img/logo/logo.svg" alt="Logo de l\'association Amitie Cevenole">
        </a>

        <li>
            <a href="./index.php">ACCUEIL</a>
        </li>
        <li>
            <p>●</p>
        </li>
        <li>
            <a href="./notre_asso.php">NOTRE ASSO</a>
        </li>
        <li>
            <p>●</p>
        </li>
        <li>
            <a href="./nos_sejours.php">NOS SÉJOURS</a>
        </li>
        <li>
            <p>●</p>
        </li>
        <li>
            <a href="./inscriptions.php">S\'INSCRIRE</a>
        </li>
        <li>
            <p>●</p>
        </li>
        <li>
            <a href="./notre_actualite.php">NOTRE ACTUALITÉ</a>
        </li>
        <li>
            <p>●</p>
        </li>
        <li>
            <a href="./contact.php">
                CONTACT
            </a>
        </li>
    </ul>'  ;
    }?>
   
</nav>
<script src="./js/menuBurger.js"></script>
