
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
        alert('Votre message a bien été envoyé,merci de nous avoir contacté.') ;
        document.forms[0].submit() ;
    }

}

/*let nom = document.getElementsByClassName('nom_input');
let prenom = document.getElementsByClassName('prenom_input');
let email = document.getElementsByClassName('email_input');
let objet = document.getElementsByClassName('object_input');
let message = document.getElementsByClassName('message_input');
let messageError = document.getElementsByClassName('messageError');
let validText = /[a-z]/ ;
let validAddress = /([a-zA-Z{1,20}])[@{1,1}]([a-z]{1,20})\.([a-z]{2,3})/ ;


function checkForm(){
    // Gestion de l'envoi des messages dans la page contact.php
    let sendMessage = document.getElementsByClassName("send_message");
    console.log(nom);
    if ( !nom.value.match(validText)||!prenom.value.match(validText) || !message.value.match(validText) || !objet.value.match(validText)  ) {

        messageError.innerHTML = 'Tous les champs sont obligatoires ! Merci de vérifier votre saisie.';

    }
    else if(!email.value.match(validAddress) ){
        messageError.innerHTML = 'Merci de vérifier votre adresse mail';

    }
    else {
        // Gestion de l'envoi des messages dans la page contact.php
        let message = document.getElementsByClassName("send_message");
        message[0].addEventListener('click', function afficheBonjour() {
            alert('Votre message a bien été envoyé !');
        }, false);
        document.forms[0].submit() ;
        alert('Votre message a bien été envoyé,merci de nous avoir contacté.') ;

    }


}

*/