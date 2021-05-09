
let nom = document.querySelector('.nom_input');
let prenom = document.querySelector('.prenom_input');
let email = document.querySelector('.email_input');
let objet = document.querySelector('.object_input');
let message = document.querySelector('.message_input');
let messagereturned = document.querySelector('.messageError');
let validText = /[a-zA-Z]{2,250}/;
let validName = /[a-zA-Z]{1,50}/;
let validFirstname = /[a-zA-Z]{1,50}/;
let validObject= /[a-zA-Z]{1,80}/;
let validAddress = /([a-zA-Z{1,30}])[@{1,1}]([a-z]{1,30})\.([a-z]{2,4})$/;
let isUlrl = /([https?:\/\/](?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/;

// CHECK VALIDATION
function checkForm() {
    var sendMessage = document.getElementsByClassName("send_message");
    // ARE FORM FIELDS EMPTY ? 
   /*  if (!nom.value.match(validName) || !prenom.value.match(validFirstname) || !message.value.match(validText) || !objet.value.match(validObject)) {

        messagereturned.innerHTML = 'Tous les champs sont obligatoires ! Merci de vérifier votre saisie.';

    }
    // IS EMAIL CORRECT ? 
    else if (!email.value.match(validAddress)) {
        messagereturned.innerHTML = 'Merci de vérifier votre adresse mail';

    }
    //IS URL DETECTED ? 
   else if (nom.value.match(isUlrl)|| prenom.value.match(isUlrl)|| message.value.match(isUlrl) || objet.value.match(isUlrl)) {
        console.log(nom.value.match(isUlrl));
        messagereturned.innerHTML = 'Les liens ne sont pas autorisés. '
    }

    else {*/
        alert('Votre message a bien été envoyé,merci de nous avoir contacté.');
        document.forms[0].submit();
  //  }

}

/*let nom = document.getElementsByClassName('nom_input');
let prenom = document.getElementsByClassName('prenom_input');
let email = document.getElementsByClassName('email_input');
let objet = document.getElementsByClassName('object_input');
let message = document.getElementsByClassName('message_input');
let messagereturned = document.getElementsByClassName('messagereturned');
let validText = /[a-z]/ ;
let validAddress = /([a-zA-Z{1,20}])[@{1,1}]([a-z]{1,20})\.([a-z]{2,3})/ ;


function checkForm(){
    // Gestion de l'envoi des messages dans la page contact.php
    let sendMessage = document.getElementsByClassName("send_message");
    console.log(nom);
    if ( !nom.value.match(validText)||!prenom.value.match(validText) || !message.value.match(validText) || !objet.value.match(validText)  ) {

        messagereturned.innerHTML = 'Tous les champs sont obligatoires ! Merci de vérifier votre saisie.';

    }
    else if(!email.value.match(validAddress) ){
        messagereturned.innerHTML = 'Merci de vérifier votre adresse mail';

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