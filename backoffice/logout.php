<?php
include('includes/config.php');
include('includes/init.php');
include('includes/fonctions.php');
unset($_SESSION['user_registered']);


header('Location: index.php');
?>
