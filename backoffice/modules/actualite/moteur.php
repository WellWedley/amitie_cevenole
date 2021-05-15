<?php
$_method = ($_POST['method']!='') ? $_POST['method'] : (($_GET['method']!='')?$_GET['method']:'actualite');
include('methods/'.$_method.'/actions.php');
?>