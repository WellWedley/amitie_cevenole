<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="mail_wrap">
        <div class="user_infos">
            <div class="first_line">
                <div class="nom_user">
                    <?php echo 'Nom' ?>
                </div>
                <div class="prenom_user">
                    <?php echo 'Prénom' ?>
                </div>
            </div>

            <div class="second_line">
                <div class="email_user">
                    <?php echo 'Email' ?>
                </div>
                <div class="num_user">
                    <?php echo 'Numéro' ?>
                </div>
            </div>
        </div>


        <div class="message_content">
            <p>Je suis du contenu d'exemple</p>
        </div>
    </div>
    <style>
        @font-face {
            font-family: 'Poppins Bold';
            src: url('../fonts/poppins/Poppins-Bold.ttf') format('truetype');
        }

        .mail_wrap {
            background: linear-gradient(25deg, rgba(165, 215, 213, 1) 0%, rgba(170, 207, 213, 1) 18.55%, rgba(184, 183, 214, 1) 48.04%, rgba(189, 176, 214, 1) 56.04%, rgba(193, 190, 223, 1) 78.94%, rgba(195, 197, 228, 1) 100%);
            ;
            position: relative;
            top: 5vw;
            left: 17.5vw;
            width: 65vw;
            height: 30vw;
            display: flex;
            flex-direction: column;
       
            align-items: center;
            font-size: 1vw;
            font-family: 'Poppins Bold';
        }

        .user_infos {
            display: flex;
            flex-direction: column;
            position: relative;
            top: 3vw;
        }

        .first_line,
        .second_line {
            display: flex;
            flex-direction: row;
            height: 3vw;
        }

        .nom_user,
        .prenom_user,
        .email_user,
        .num_user {
            text-align: center;
            background-color: #054872;
            color: #fff;
            width: 25vw;
            height: 1.5vw;
            margin: 1vw;
    

        }

        .message_content {
            position: relative;
           top: 5vw;
            border: 1px solid #054872;
            width: 80%;
            height: 15vw;
            
        }
    </style>


</body>

</html>