<?php
$dsn = 'mysql:host=localhost; dbname=amitie_cevenole';
$user = 'root';
$pwd = 'root';
$db  = new PDO($dsn, $user, $pwd);
try {
    $db = new PDO($dsn, $user, $pwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
} catch (Exception $e) {
    die('Erreur de connexion : </br>' . $e->getMessage());
}