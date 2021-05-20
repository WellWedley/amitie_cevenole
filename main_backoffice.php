<?php
require_once 'backoffice/db/db.php';
require_once './backoffice/request_handler.php';


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
  include('header.php'); ?>

  <div class="admin_square">

    <div class="manage_cpt">
      <h1>Ajouter le prochain compteur de séjour </h1>
      <div class="add_box">
        <div class="add_cpt" id="add_cpt">
          <form>
            <label for="next_departure" id="year_dep_label"></label>
            <select name="year_select" id="year_dep_sel">

            </select>
            <label for="next_departure" id="month_dep_label"></label>
            <select name="month_selec" id="month_dep_sel">

            </select>
          </form>

        </div>
      </div>

      <h1> Supprimer un compteur</h1>
      <div class="rem_box">
        <div class="rem_cpt">

          <form>
          </form>

        </div>
      </div>
    </div>


    <div class="add_picture">
      <h1>
        Ajouter des photos à un séjour
      </h1>

      <div class="add_picture_box">


      </div>

    </div>

  </div>
  <?php

  $sess_id = $_SESSION['sess_id'];
  // DISPLAYS DIRECTOR'S SESSION 
  if (isset($sess_id) && $sess_id != "" &&  $sess_id == 1) {
    // Mettre le code ici, une fois terminé 



  } else {
    header('location:./index.php');
  }
  ?>
  <?php include('./footer.php') ?>
  <script src="./js/calendar.js"></script>
</body>

</html>