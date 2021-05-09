<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client('b6127d16aecb16788842fdef11468ae3','e3b4e3225547a62ccf1ce464f87d2496',true,['version' => 'v3.1']);
$from  ='contact@amitiecevenole.com';
$to  ='sejour.aepc@gmail.com';

//User's inputs 
$userName  =htmlentities($_POST['nom_input']);
$userFirstname  =htmlentities($_POST['prenom_input']);
$message  =htmlentities($_POST['message_input']);
$object_input  =htmlentities($_POST['object_input']);
$replyTo  =htmlentities($_POST['email_input']);

if (isset($userName) && isset($userFirstname) && isset($message )&& isset($object_input)&& isset($replyTo) && isset($object_input)){
    // Contenu du mail
    $html_part = '<html><body>
    <h1 style="color:#054872">Nouveau message à partir du site Internet : </h1>
    <div><p>Nom : '.$userName.'</p> </div><br>
    <div><p>Prénom : '.$userFirstname.'</p> </div><br>
    <div><p>Email : '.$replyTo.'</p> </div><br>
    <div><p>Message :<br> '.$message.'</p> </div><br>
    </body></html>' ; 




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
        header('Location: ./contact.php'); 

}
else
{
    echo 'Un problème est survenu lors de la soumission de votre message veuillez réessayer plus tard. ';

}
