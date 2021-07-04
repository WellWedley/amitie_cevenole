<?php
if (isset($_POST['id_sejour'])) {
        if (isset($_FILES['img_input']['tmp_name'])) {
          $id_sejour = $_POST['id_sejour'] ; 
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

         
                try {
                  $sql = "SELECT *  FROM sejours WHERE id_sejour=?" ; 
                  $req = $db->prepare($sql);
                  # code...
                  $result= $req->execute(array($id)) ; 
                  foreach ($row as $key => $value) {
                    # code...
                  }
                  
                
                } catch (PDOException $e) {
                  echo "Error : " . $e->getMessage();
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
        } 
}
?>
      </div>

    </div>

  </div>

