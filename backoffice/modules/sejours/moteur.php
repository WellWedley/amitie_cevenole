<?php
$_method = ($_POST['method']!='') ? $_POST['method'] : (($_GET['method']!='')?$_GET['method']:'sejours');
include('methods/'.$_method.'/actions.php');
?>