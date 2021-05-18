<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include 'head.php';
    ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5785GBW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
    include 'header.php'; ?>

    <!-- LOGIN_FORM -->
    <form action="backoffice/request_handler.php" method="POST" class="form_content">
        <div class="login_wrapper">

            <div class="first_line_wrapper">
                <div class="first_line_label">
                    <label for="email_input">Identifiants</label>
                </div>

                <div class="first_line_input">
                    <input placeholder="Email ou mot de passe" type="text" class="email_input" name="email_input" required>
                </div>

            </div>

            <div class="second_line_wrapper">

                <div class="first_line_input">
                    <label for="password_input">Mot de passe </label>
                </div>

                <div>
                    <input type="text" class="passw_input" name="password_input" required>
                </div>

            </div>

            <div class="last_wrapper">
                <input type="submit" value="Me connecter" class="connect" name="SubmitButton">
            </div>

        </div>
    </form>
    <?php
    include_once 'footer.php'; ?>
</body>

</html>