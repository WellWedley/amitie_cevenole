
window.addEventListener('DOMContentLoaded', function manageIntro() {
    var first = document.getElementById('first_circle');
    var second = document.getElementById('second_circle');
    var third = document.getElementById('third_circle');
    var opacity = 0;
    first.style.opacity = opacity;
    second.style.opacity = opacity;
    third.style.opacity = opacity;

    setTimeout(() => {
        while (opacity < 1) {
            opacity += 0.1;
            first.style.opacity = opacity;
            second.style.opacity = opacity;
            third.style.opacity = opacity;    
        }
    }, 500);

}, false);




// Gestion de l'envoi des messages dans la page contact.php
var message = document.getElementsByClassName("send_message");
message[0].addEventListener('click', function afficheBonjour() {
    alert('Votre message a bien été envoyé !');
}, false);

