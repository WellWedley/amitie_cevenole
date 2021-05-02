let nom = document.querySelector('.nom_input');
let prenom = document.querySelector('.prenom_input');
let email = document.querySelector('.email_input');
let objet = document.querySelector('.object_input');
let message = document.querySelector('.message_input');
let messageError = document.querySelector('.messageError');
let validText = /[a-z]/ ;
let validAddress = /([a-zA-Z{1,20}])[@{1,1}]([a-z]{1,20})\.([a-z]{2,3})/ ;


function checkForm(){
    // Gestion de l'envoi des messages dans la page contact.php
    var sendMessage = document.getElementsByClassName("send_message");
    if ( !nom.value.match(validText)||!prenom.value.match(validText) || !message.value.match(validText) || !objet.value.match(validText)  ) {

        messageError.innerHTML = 'Tous les champs sont obligatoires ! Merci de vérifier votre saisie.';

    }
    else if(!email.value.match(validAddress) ){
        messageError.innerHTML = 'Merci de vérifier votre adresse mail';

    }
    else {
        // Gestion de l'envoi des messages dans la page contact.php
        var message = document.getElementsByClassName("send_message");
        message[0].addEventListener('click', function afficheBonjour() {
            alert('Votre message a bien été envoyé !');
        }, false);
        alert('Votre message a bien été envoyé,merci de nous avoir contacté.') ;
        document.forms[0].submit() ;
    }


}

