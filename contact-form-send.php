<?php
require 'vendor/autoload.php';

use \Mailjet\Resources;

$mj = new \Mailjet\Client('b6127d16aecb16788842fdef11468ae3', 'e3b4e3225547a62ccf1ce464f87d2496', true, ['version' => 'v3.1']);
$from  = 'contact@amitiecevenole.com';
$to  = 'sejour.aepc@gmail.com';

//User's inputs 
$userName  = htmlentities($_POST['nom_input']);
$userFirstname  = htmlentities($_POST['prenom_input']);
$message  = htmlentities($_POST['message_input']);
$replyTo  = htmlentities($_POST['email_input']);
$validText = '/[a-zA-Z]{2,250}/';
$validName = '/[a-zA-Z]{1,50}/';
$validFirstname = '/[a-zA-Z]{1,50}/';
$validObject = '/[a-zA-Z]{1,80}/';


$validAddress = '/([a-zA-Z{1,30}])[@{1,1}]([a-z]{1,30})\.([a-z]{2,4})$/';
if (isset($userName) && isset($userFirstname) && isset($message)  && isset($replyTo)) {

    // vérification que des liens n'ont pas été insérés 
    if (preg_match('/www\.|http:|https:/', $userName) || preg_match('/www\.|http:|https:/', $userFirstname) || preg_match('/www\.|http:|https:/', $message)  || preg_match('/www\.|http:|https:/', $replyTo)) {
        echo 'Erreur : Caractères invalides.';
    } else if (!preg_match($validAddress, $replyTo)) {
        echo 'Erreur : E-mail non valide.';
    } else if (!preg_match($validName, $userName) || !preg_match($validName, $userFirstname) || !preg_match($validName, $message) || !preg_match($validName, $replyTo)) {
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
                        'Name' => "amitiecevenole.com",
                    ],
                    'To' => [
                        [
                            'Email' => "sejour.aepc@gmail.com",
                            'Name' => "Amitié Cévenole "
                        ]
                    ],
                    'Subject' => "Message en provenance du site internet.",
                    'TextPart' => "Partie texte",
                    'HTMLPart' => $html_part,
                    'CustomID' => "AppGettingStartedTest",
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
}
