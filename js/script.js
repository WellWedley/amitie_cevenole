
<<<<<<< HEAD

window.addEventListener('DOMContentLoaded', function manageIntro() {
    let first = document.getElementById('first_circle');
    let second = document.getElementById('second_circle');
    let third = document.getElementById('third_circle');
    let opacity = 0;
=======
window.addEventListener('DOMContentLoaded', function manageIntro() {
    var first = document.getElementById('first_circle');
    var second = document.getElementById('second_circle');
    var third = document.getElementById('third_circle');
    var opacity = 0;
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
    first.style.opacity = opacity;
    second.style.opacity = opacity;
    third.style.opacity = opacity;

<<<<<<< HEAD

    //Refreshes circle's opacity every 500ms
=======
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
    setTimeout(() => {
        while (opacity < 1) {
            opacity += 0.1;
            first.style.opacity = opacity;
            second.style.opacity = opacity;
<<<<<<< HEAD
            third.style.opacity = opacity;
        }

=======
            third.style.opacity = opacity;    
        }
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
    }, 500);

}, false);




<<<<<<< HEAD
=======
// Gestion de l'envoi des messages dans la page contact.php
var message = document.getElementsByClassName("send_message");
message[0].addEventListener('click', function afficheBonjour() {
    alert('Votre message a bien été envoyé !');
}, false);
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e

