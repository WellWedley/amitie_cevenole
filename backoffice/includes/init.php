<?php
// error_reporting(E_ALL);
session_start();
// set_time_limit(0);
set_time_limit(0);

date_default_timezone_set ( 'Europe/Paris' );
include('bdd.php');
#########################################
### LISTING DES MODULES INSTALLES	  ###
#########################################
$ModulesOrder = array(
	1=>array('index','Accueil'),
	2=>array('contenu','Site'),
	3=>array('sejours','Séjours'),
	4=>array('newsletter','Newsletter'),
	5=>array('parametres','Paramètres')
);
$_module =  ($_POST['module']!='') ? $_POST['module'] : (($_GET['module']!='') ? $_GET['module'] : 'index');


function php4_scandir($dir,$listDirectories=false, $skipDots=true) {
    $dirArray = array();
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if (($file != "." && $file != "..") || $skipDots == true) {
                if($listDirectories == false) { if(is_dir($file)) { continue; } }
                array_push($dirArray,basename($file));
            }
        }
        closedir($handle);
    }
    return $dirArray;
}



$ArrModules = scandir($Config['ROOT_PATH']."backoffice/modules");

#########################################
### PERMISSIONS UTILISATEURS BO       ###
#########################################
$location = ereg_replace('\.php(.*)','',basename($_SERVER['REQUEST_URI']));
$location = ($location !='backoffice') ? $location :'index';
if((!is_numeric($_SESSION['user_registered']))AND($location!="login")){
	header("Location: login.php");
}else{
	if(($location!="login")AND($location!="logout")){
		$sql = mysql_query("SELECT * FROM admin_privileges WHERE admin_id='".$_SESSION['user_registered']."' AND module='".trim($location)."'");
		if(mysql_num_rows($sql)==0){
			echo "<p><strong class='warning'>Vous n'avez pas les privilèges necessaires pour afficher cette page, veuillez contacter l'administrateur du site</strong></p>";
			exit();
		}
	}
}

#########################################

# Config mails :
define(__PATH_MAIL__,$Config['ROOT_PATH']."templates/mails");
include($Config['ROOT_PATH']."backoffice/lib/class_mails.php");



#########################################
?>
