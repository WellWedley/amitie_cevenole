<?php
$Config = array();

# Config du site ########################################################################################

$Config['SITE_NAME'] = 'amitiecevenole.com';
$Config['ROOT_PATH'] = '/homez.367/amitiece/www/';

$Config['HTTP_HOSTNAME'] = 'www.amitiecevenole.com';
$Config['MAX_IDLE_TIME'] = 280;
$Config['TEST_MODE'] = false;
# FTP ###################################################################################################

$Config['FTP_HOSTNAME'] = 'ftp.cluster010.ovh.net';
$Config['FTP_USERNAME'] = 'amitiece';
$Config['FTP_PASSWORD'] = 'AfiLKnMt';

# MySQL #################################################################################################

$Config['SQL_HOSTNAME'] = 'mysql51-35.perso';
$Config['SQL_USERNAME'] = 'amitiecedata';
$Config['SQL_PASSWORD'] = 'HwqdCJjG';
$Config['SQL_BDD_NAME'] = 'amitiecedata';


/*
# Config du site ########################################################################################

$Config['SITE_NAME'] = 'amitiecevenole.com';
$Config['ROOT_PATH'] = '/home/tebayo/sd/amce/www/';

$Config['HTTP_HOSTNAME'] = 'amce.tebayo.com';
$Config['MAX_IDLE_TIME'] = 280;
$Config['TEST_MODE'] = false;
# FTP ###################################################################################################

$Config['FTP_HOSTNAME'] = 'tebayo.com';
$Config['FTP_USERNAME'] = 'tebayo';
$Config['FTP_PASSWORD'] = 'ksyhaz6s8';

# MySQL #################################################################################################

$Config['SQL_HOSTNAME'] = 'localhost';
$Config['SQL_USERNAME'] = 'tebayo';
$Config['SQL_PASSWORD'] = 'keov12dz4';
$Config['SQL_BDD_NAME'] = 'tebayo_amce';

*/




# PHP ###################################################################################################
ini_set("memory_limit","1024M");
ini_set('upload_max_filesize','100M');
ini_set('post_max_size','100M');

?>