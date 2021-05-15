<?php
$db = mysql_connect($Config['SQL_HOSTNAME'],$Config['SQL_USERNAME'],$Config['SQL_PASSWORD'])or die("erreur de connexion au serveur, nous travaillons sur  les fichiers, merci de revenir ultérieurement");
$bdd = mysql_select_db($Config['SQL_BDD_NAME'],$db) or die("erreur connexion au serveur ");
mysql_query('SET NAMES iso-8859-15;');
mysql_query('SET CHARACTER SET iso-8859-15;');
?>