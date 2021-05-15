<?php
require'db/db.php';
session_start();

$msg = "";
if (isset($_POST['SubmitButton'])) {
    $mail_input =strip_tags( $_POST['email_input']);
    $pseudo_input = strip_tags($_POST['pseudo_input']);
    $pwd_input = strip_tags( $_POST['password_input']);

    if ($mail_input != "" && $pwd_input != "") {

        try {
            $stmt = $db->prepare("SELECT * FROM `directeurs` WHERE `mail_dir`=:mail_input OR `pseudo_dir`=:pseudo_input");
            $stmt->execute(array(':mail_input' => $mail_input, 'pseudo_input' => $pseudo_input));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if ($mail_input == $row['mail_dir'] || $pseudo_input == $row['pseudo_dir']) {
                    if (password_verify($pwd_input, $row['mdp_dir'])) {

                      
                        $_SESSION['sess_id']   = $row['id_dir'];
                        $_SESSION['sess_username'] = $row['prenom_dir'];
                        $_SESSION['sess_name'] = $row['nom_dir'];
                   
                        header('location:../main_backoffice.php');
                    }else {
                        $msg = "Mot de passe ou identifiants non reconnus. ";
                    }
                }
            } else {
                $msg = "Mot de passe ou identifiants non reconnus. ";
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }
}
