<?php

// Mailjet()
require 'vendor/autoload.php';

use \Mailjet\Resources;
$mj = new \Mailjet\Client('b6127d16aecb16788842fdef11468ae3','e3b4e3225547a62ccf1ce464f87d2496',true,['version' => 'v3.1']);

if (isset($_POST['send_message']) && isset($_POST['prenom_input'])  && isset($_POST['nom_input']) && isset($_POST['email_input']) && isset($_POST['message_input']) && isset($_POST['object_input'])) {
    $prenom = $_POST['prenom_input'];
    $nom = $_POST['nom_input'];
    $adresseDest = $_POST['email_input'];
    $text = $_POST['message_input'];
    $subject = $_POST['object_input'];
    $to  = 'contact@amitiecevenole.com';

    // Sujet
    $subject = htmlentities($subject);

    // message
    $text = htmlentities('
    <html lang="fr">
     <head>
      <title>.' . $subject . '</title>
     </head>
     <body>
      ' . htmlentities($text) . '
     </body>
    </html>
    ');

    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';

    // En-têtes additionnels
    $headers[] = 'To:' . $to;
    $headers[] = 'From:' . htmlentities($adresseDest);
    $headers[] = 'Cc:' . htmlentities($subject);

    // Envoi
    mail($to, $subject, $text, implode("\r\n", $headers));
    header('Location:./index.php');
} else {
    echo "<script> alert('Un Problème est survenu lors de l\'envoi de votre message. Veuillez réssayer plus tard.')</script>
        ";
}

if (isset($_POST['send_message']) && isset($_POST[$prenom])  && isset($_POST[$nom]) && isset($_POST[$adresseDest]) && isset($_POST[$text]) && isset($_POST[$subject])) {
    $prenom = $_POST['prenom_input'];
    $nom = $_POST['nom_input'];
    $adresseExp = $_POST['email_input'];
    $text = $_POST['message_input'];
    $subject = $_POST['object_input'];
    $adresseDest = "sejour.aepc@gmail.com";

    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => htmlentities($adresseDest),
                    'Name' => htmlentities($prenom)
                ],
                'To' => [
                    [
                        'Email' => "contact@amitiecevenole.com",
                        'Name' => "Amitié Cévenole"
                    ]
                ],
                'ReplyTo' => [
                    'Email' => htmlentities($adresseExp),
                    "Name" => htmlentities($nom)

                ],
                'Subject' => htmlentities($subject),
                'TextPart' => "",
                'HTMLPart' =>  "<h1>" . htmlentities($prenom) . " " . htmlentities($nom) . " a posé une question  :</h1>" . "<br><p>" . htmlentities($text) . "</p>",
                'CustomID' => "AppGettingStartedTest"
            ]
        ]
    ];


    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && var_dump($response->getData());
    header('Location:./index.php') ; 
} else {
    echo '<script> alert(\"Un Problème est survenu lors de l\'envoi de votre message. Veuillez réssayer plus tard.")</script>';
   // header('Location:./index.php') ;
}
