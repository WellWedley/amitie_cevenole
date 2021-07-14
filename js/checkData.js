// CONTACT FORM VARIABLES DECLARATION

let nom = document.querySelector('.nom_input');
let prenom = document.querySelector('.prenom_input');
let email = document.querySelector('.email_input');
// let objet = document.querySelector('.object_input');
let message = document.querySelector('.message_input');
let messagereturned = document.querySelector('.messageError');

//LOGIN PAGE VARIABLES DECLARATION
let pseudo = document.querySelector('.email_input');
let pwd = document.querySelector('.pass_input');

// REGEXP DECLARATION 
let validText = /[a-zA-Z]{2,250}/;
let validName = /[a-zA-Z]{1,50}/;
let validFirstname = /[a-zA-Z]{1,50}/;
let validObject = /[a-zA-Z]{1,80}/;
let validAddress = /([a-zA-Z{1,30}])[@{1,1}]([a-z]{1,30})\.([a-z]{2,4})$/;
let isUlrl = /([https?:\/\/](?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/;

// CHECK FORM VALIDATION CONTACT.PHP
function checkForm() {
    let sendMessage = document.getElementsByClassName("send_message");
    // ARE FORM FIELDS EMPTY ? 
    if (!nom.value.match(validName) || !prenom.value.match(validFirstname) || !message.value.match(validText)) {

        messagereturned.innerHTML = 'Tous les champs sont obligatoires ! Merci de vérifier votre saisie.';

    }
    // IS EMAIL CORRECT ? 
    else if (!email.value.match(validAddress)) {
        messagereturned.innerHTML = 'Merci de vérifier votre adresse mail';

    }
    //IS URL DETECTED ? 
    else if (nom.value.match(isUlrl) || prenom.value.match(isUlrl) || message.value.match(isUlrl)) {
        console.log(nom.value.match(isUlrl));
        messagereturned.innerHTML = 'Les liens ne sont pas autorisés. '
    } else {
        alert('Votre message a bien été envoyé,merci de nous avoir contacté.');
        document.forms[0].submit();
    }

}




function checkLogin() {
    let login = document.getElementsByClassName("submit_btn");
    login.addEventListener('click')
        // ARE FORM FIELDS EMPTY ? 
    if (!pseudo.value.match(validName) || !pwd.value.match(validFirstname)) {

        messagereturned.innerHTML = 'Tous les champs sont obligatoires ! Merci de vérifier votre saisie.';

    }
    // IS EMAIL CORRECT ? 
    else if (!email.value.match(validAddress)) {
        messagereturned.innerHTML = 'Merci de vérifier votre adresse mail';

    }
    //IS URL DETECTED ? 
    else if (nom.value.match(isUlrl) || prenom.value.match(isUlrl) || message.value.match(isUlrl)) {
        console.log(nom.value.match(isUlrl));
        messagereturned.innerHTML = 'Les liens ne sont pas autorisés. '
    } else {
        alert('Votre message a bien été envoyé,merci de nous avoir contacté.');
        document.forms[0].submit();
    }

}