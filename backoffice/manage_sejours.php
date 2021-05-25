<?php $photos_sejours = [];


if (isset($_FILES['img_input']['tmp_name'])) {
  $type = mime_content_type($_FILES['img_input']['tmp_name']);
  $img = $_FILES['img_input'];

  if (substr($type, 0, 5) == "image") {
    if (!is_dir('./files')) {
      mkdir('./files');
    }

    move_uploaded_file($img['tmp_name'], "./files/" . $img['name']);
    array_push($photos_sejours, "./files/" . $img['name']);
   

    echo '<p>La photo a bien été envoyée.</p>';
    echo '<img style="width:50%" src="files/' . $img['name'] . '">';

    for ($index = 0; $index < count($photos_sejours); $index++) {
      echo '<img style="width:50%" src="' . $photos_sejours[$index] . '">';
      echo $photos_sejours[$index] ; 

    }
} elseif (substr($type, 0, 5) != "image") {
    echo "Le format de fichier n'est pas pris en charge. (.jpg, .jpeg, .png, )";
}

}
