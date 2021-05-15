<?php
// phpinfo();
include('includes/config.php');
include('includes/fonctions.php');
include('includes/init.php');


include('modules/'.$_module.'/includes/config.php');
include('includes/meta_start.php');
if(file_exists('modules/'.$_module.'/jscript/script.js')){
	?><script type="text/javascript" src="modules/<?php echo $_module; ?>/jscript/script.js"></script><?php
}
if(file_exists('modules/'.$_module.'/css/style.css')){
	?><link rel="stylesheet" type="text/css" href="modules/<?php echo $_module; ?>/css/style.css" /><?php
}
include('includes/meta_end.php');
include('includes/tpl_header.php');
include('modules/'.$_module.'/moteur.php');
include('includes/tpl_footer.php');
?>
