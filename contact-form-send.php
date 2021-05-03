<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client('b6127d16aecb16788842fdef11468ae3','e3b4e3225547a62ccf1ce464f87d2496',true,['version' => 'v3.1']);
$from  ='contact@amitiecevenole.com';
$to  ='sejour.aepc@gmail.com';
$userName  =htmlentities($_POST['nom_input']);
$userFirstname  =htmlentities($_POST['prenom_input']);
$message  =htmlentities($_POST['message_input']);
$subject  =htmlentities($_POST['object_input']);
$replyTo  =htmlentities($_POST['email_input']);

$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => $from,
                'Name' => $userFirstname, $userFirstname
            ],
            'To' => [
                [
                    'Email' => "sejour.aepc@gmail.com",
                    'Name' => "Amitié Cévenole "
                ]
            ],
            'Subject' => $subject,
            'TextPart' => "My first Mailjet email",
            'HTMLPart' => "<h1>" . htmlentities($userFirstname) . " " . htmlentities($userName) . " a posé une question  :</h1>" . "<br><p>" . htmlentities($message) . "</p>",
            'CustomID' => "AppGettingStartedTest"
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success() && var_dump($response->getData());
?>
