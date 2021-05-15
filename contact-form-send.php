<?php
<<<<<<< HEAD
=======




// PHPMAILER()

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';



// Mailjet()

>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
require 'vendor/autoload.php';

use \Mailjet\Resources;

<<<<<<< HEAD
$mj = new \Mailjet\Client('b6127d16aecb16788842fdef11468ae3', 'e3b4e3225547a62ccf1ce464f87d2496', true, ['version' => 'v3.1']);
$from  = 'contact@amitiecevenole.com';
$to  = 'sejour.aepc@gmail.com';

//User's inputs 
$userName  = htmlentities($_POST['nom_input']);
$userFirstname  = htmlentities($_POST['prenom_input']);
$message  = htmlentities($_POST['message_input']);
$object_input  = htmlentities($_POST['object_input']);
$replyTo  = htmlentities($_POST['email_input']);
$validText = '/[a-zA-Z]{2,250}/';
$validName = '/[a-zA-Z]{1,50}/';
$validFirstname = '/[a-zA-Z]{1,50}/';
$validObject = '/[a-zA-Z]{1,80}/';


$validAddress = '/([a-zA-Z{1,30}])[@{1,1}]([a-z]{1,30})\.([a-z]{2,4})$/';
if (isset($userName) && isset($userFirstname) && isset($message) && isset($object_input) && isset($replyTo)) {

    // vérification que des liens n'ont pas été insérés 
    if (preg_match('/www\.|http:|https:/', $userName) || preg_match('/www\.|http:|https:/', $userFirstname) || preg_match('/www\.|http:|https:/', $message) || preg_match('/www\.|http:|https:/', $object_input) || preg_match('/www\.|http:|https:/', $replyTo)) {
        echo 'Erreur : Caractères invalides.';
    } else if (!preg_match($validAddress, $replyTo)) {
        echo 'Erreur : E-mail non valide.';
    } else if (!preg_match($validName, $userName) || !preg_match($validName, $userFirstname) || !preg_match($validName, $message) || !preg_match($validName, $object_input) || !preg_match($validName, $replyTo)) {
        echo 'Erreur : Champs vide(s).';
    } else {
        // Contenu du mail
        $html_part = '<html><body>
    <h1 style="color:#054872">Nouveau message à partir du site Internet : </h1>
    <div><p>Nom : ' . $userName . '</p> </div><br>
    <div><p>Prénom : ' . $userFirstname . '</p> </div><br>
    <div><p>Email : ' . $replyTo . '</p> </div><br>
    <div><p>Message :<br> ' . $message . '</p> </div><br>
    </body></html>';

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $from,
                        'Name' => $userFirstname,
                    ],
                    'To' => [
                        [
                            'Email' => "sejour.aepc@gmail.com",
                            'Name' => "Amitié Cévenole "
                        ]
                    ],
                    'Subject' => $object_input,
                    'TextPart' => "Partie texte",
                    'HTMLPart' => $html_part,
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());
        $date_courante = new DateTime();
        header('Location: ./contact.php');
        exit;
    }
} else {
    echo 'Un problème est survenu lors de la soumission de votre message veuillez réessayer plus tard. ';
=======
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
    <html>
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
    echo '<script> alert(\'Un Problème est survenu lors de l\'envoi de votre message. Veuillez réssayer plus tard.\')</script>
        ';
}

if (isset($_POST['send_message']) && isset($_POST['prenom_input'])  && isset($_POST['nom_input']) && isset($_POST['email_input']) && isset($_POST['message_input']) && isset($_POST['object_input'])) {
    $prenom = $_POST['prenom_input'];
    $nom = $_POST['nom_input'];
    $adresseExp = $_POST['email_input'];
    $text = $_POST['message_input'];
    $subject = $_POST['object_input'];
    $adresseDest = "sejour.aepc@gmail.com";

    $mj = new \Mailjet\Client('b6127d16aecb16788842fdef11468ae3', 'e3b4e3225547a62ccf1ce464f87d2496', true, ['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => htmlentities($adresseDest),
                    'Name' => htmlentities($prenom)
                ],
                'To' => [
                    [
                        'Email' => "sejour.aepc@gmail.com",
                        'Name' => "Amitié Cévenole"
                    ]
                ],
                'ReplyTo' => [
                    'Email' => htmlentities($adresseExp),
                    "Name" => htmlentities($Nom)

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
    echo '<script> alert(\'Un Problème est survenu lors de l\'envoi de votre message. Veuillez réssayer plus tard.\')</script>
    ';
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
}
