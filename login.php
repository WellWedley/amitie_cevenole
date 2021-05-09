<?php

include 'head.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
    <?php
    include 'header.php'; ?>
    <form action="contact-form-send.php" method="POST" class="form_content">
        <div class="login_wrapper">
            
            <div class="first_line_wrapper">
                <input placeholder="Adresse email :" type="text" class="email_input" name="email_input" required>

            </div>
            <div class="second_line_wrapper">
                <div>
                    <input placeholder="Mot de passe" type="text" class="passw_input" name="password_input" required>
                </div>
            </div>
            <div class="last_wrapper">
                <input type="submit" value="Me connecter" class="connect" name="connexion">
            </div>
        </div>

    </form>
    <?php
    include 'footer.php'; ?>
</body>

</html>