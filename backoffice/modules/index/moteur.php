<?php
$_method = ($_POST['method']!='') ? $_POST['method'] : (($_GET['method']!='')?$_GET['method']:'index');
include('methods/'.$_method.'/actions.php');
?>