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

      <div class="add_picture_box">
        <form action="" id="add_picture_form" method="POST" enctype="multipart/form-data">
          <input type="file" name="img_input" id="input_file" multiple />
          <button type="submit">Envoyer</button>
        </form>
        <p id="message"></p>
        <?php
        if (isset($_FILES['img_input']['tmp_name'])) {
          $type = mime_content_type($_FILES['img_input']['tmp_name']);
          $img = $_FILES['img_input'];
          $photos_sejours = [];

          if (substr($type, 0, 5) == "image") {
            if (!is_dir('./files/uploads')) {
              mkdir('./files/uploads');
            }

            move_uploaded_file($img['tmp_name'], "./files/" . $img['name']);
            array_push($photos_sejours, "./files/" . $img['name']);

            if (isset($_FILES['img_input']['tmp_name'])) {
              $file_path = $_FILES['img_input'];

              for ($i = 1; $i < 12; $i++) {
                try {

                  $stmt = $db->prepare("SELECT *  FROM `sejours` WHERE `picture$i` =:picture" . $i . "");
                  # code...
                  $stmt->execute(array(':picture' . $i => "picture" . $i));
                  $row = $stmt->fetch();
        
                  echo '<img src="' . $row['picture$i'].'">';
                    
                  if ($stmt->rowCount() > 0) {
                    if ("picture" . $i == $row['picture' . $i]) {
                      echo '<img src="' . $file_path . '">';
                    } else {
                      $stmt = $pdo->prepare("INSERT INTO sejours (email, vorname, nachname) VALUES (?)");
                      $stmt->execute(array('info@php-einfach.de', 'Klaus', 'Neumann'));
                    }
                  }
                } catch (PDOException $e) {
                  echo "Error : " . $e->getMessage();
                }
              }
            }
            echo '<p>La photo a bien été envoyée.</p>';


            for ($index = 0; $index < count($photos_sejours); $index++) {
              echo '<img style="width:50%" src="' . $photos_sejours[$index] . '">';
              echo $photos_sejours[$index];
            }
          } elseif (substr($type, 0, 5) != "image") {
            echo "Le format de fichier n'est pas pris en charge. (.jpg, .jpeg, .png, )";
          }
        } ?>


      </div>

    </div>

  </div>

  <!-- <?php
        $sess_id = $_SESSION['sess_id'];
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