<?php
require_once 'backoffice/db/db.php';
require_once './backoffice/request_handler.php' ; 
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php
  include('head.php');
  ?>
</head>

<body>
  <?php
  include('header.php');

  if (isset($_SESSION['sess_id']) && $_SESSION['sess_id'] != "") {
    echo '<h1>Welcome ' . $_SESSION['sess_name'] . '</h1>';
    echo '<h4><a href="logout.php">Logout</a></h4>';
    
  } else {
    header('location:./index.php');
    
  }
  ?>
</body>

</html>