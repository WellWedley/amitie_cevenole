<?php
require_once 'backoffice/db/db.php';
require_once './backoffice/request_handler.php';
$sess_id = $_SESSION['sess_id'];
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
            <label for="year_select" id="year_dep_label"></label>
            <select name="year_select" id="year_dep_sel">

            </select>
            <label for="month_select" id="month_dep_label"></label>
            <select name="month_selec" id="month_dep_sel">

            </select>

            <label for="day_select" id="day_dep_label"></label>
            <input type="date" name="day_select" id="day_dep_sel">

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
      <form action="./backoffice/files/add_sejour.php">
      <?php

        $sejours = ['graine_de_fermier','explor_ados','vacances_a_la_mer','cevennes_explor']; 
          $sql = "SELECT * FROM sejours WHERE id_sejour=? " ; 
          $req = $db->prepare($sql) ; 
            
          $result = $req->execute(array()) ; 


        ?>

        <select name="" id=""></select>
      </form>



      <div class="add_picture_box">
        <form action="" id="add_picture_form" method="POST" enctype="multipart/form-data">
          <input type="file" name="img_input" id="input_file" multiple />
          <button type="submit">Envoyer</button>
        </form>
        <p id="message"></p>
        
  <!-- <?php

        // DISPLAYS user'S SESSION 
        // if (isset($sess_id) && $sess_id != "" &&  $sess_id == 1) {
        // Mettre le code ici, une fois terminé 

        // } else {
        //   header('location:./index.php');
        // }
        // 
        ?>-->


  <?php include('./footer.php') ?>

  <!-- Scripts part  -->
  <script src="./js/calendar.js"></script>
</body>

</html>