var position = 0;

var slider = document.getElementById("slider");
var slide = document.getElementById("gallery_wrapper");
var previous = document.getElementById("previous_wrapper");
var next = document.getElementById("next_wrapper");
var nb_img = 27;
<<<<<<< HEAD
var play = document.getElementsByClassName("play");
var pause = document.getElementsByClassName("pause");
=======
var play = document.getElementById("play");
var pause = document.getElementById("pause");
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
window.addEventListener("DOMContentLoaded", function createImg() {

    let array_img = { src: [] };
    for (let index_img = 1; index_img < nb_img; index_img++) {
        array_img.src[index_img] = index_img;
        slide.innerHTML += '<div class="img_wrap"> <img src=\"./img/photos_sejours/' + index_img + '.jpeg" alt="Photo des séjours de l\'année 2020"></div>';
    }

}, false);

previous.addEventListener("click", function previousSlider() {
<<<<<<< HEAD
=======
    clearInterval(autoslide);
    play.style.display = "block";
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
    if (position >= nb_img / -.3 && position <= nb_img / -3) {
        position += nb_img / 3;
        slide.style.transform = "translateX(" + position + "%)";
        slide.style.mstransform = "translate(" + position + "%)";

        next.style.display = "block";
    }
    else {
    }
    console.log(position);
}, false);


next.addEventListener("click", function nextSlider() {
<<<<<<< HEAD
=======
    clearInterval(autoslide);
    play.style.display = "block";
    pause.style.display = "none";
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
    if (position <= 0 && position >= nb_img / - .33) {
        clearInterval;
        position -= nb_img / 3;
        slide.style.transform = "translateX(" + position + "%)";
        slide.style.mstransform = "translate(" + position + "%)";
    }
    else {
        next.style.display = "none";
    }

    console.log(position);
}, false);

<<<<<<< HEAD
// Fonction qui lance automatiquement les diapositive toutes les 6 secondes
var autoslide = setInterval(function () {
    if (position >= nb_img / -.33) {
=======


// Fonction qui lance automatiquement les diapositive toutes les 3 secondes
var autoslide = setInterval(function autoslide() {
    clearInterval(autoslide);

    if (position >= nb_img / -.33) {
        pause.style.display = "block";
        play.style.display = "none";
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
        position -= nb_img / 3;
        console.log(position);
        slide.style.transform = "translateX(" + position + "%)";
        slide.style.mstransform = "translate(" + position + "%)";
<<<<<<< HEAD
    }
    else {
        clearInterval
    }
}, 6000);



=======
        console.log("autoplay");
    }
    else if (position <= -81) {
        clearInterval(autoslide);
        pause.style.display = "none";
        play.style.display = "block";
    }
    return autoslide;
}, 3000);

play.addEventListener("click", function playSlider() {
    clearInterval(autoslide);
    clearInterval(buttonPlay);
    if (position <= -81) {
        pause.style.display = "none";
        play.style.display = "block";
        position = -9;

    }
    var buttonPlay = setInterval(function playButton() {
        clearInterval(autoslide);

        if (position >= nb_img / -.33) {
            clearInterval(autoslide);
            play.style.display = "none";
            pause.style.display = "block";
            position -= nb_img / 3;
            console.log(position);
            slide.style.transform = "translateX(" + position + "%)";
            slide.style.mstransform = "translate(" + position + "%)";
        }
        else if (position <= -81) {
            clearInterval(buttonPlay);
            pause.style.display = "none";
            play.style.display = "block";

        }
    
        console.log("play");
        return buttonPlay;

    }, 3000);


}, true);
pause.addEventListener("click", function pauseSlider(buttonPlay, autoslide) {
    clearInterval(autoslide);
    clearInterval(buttonPlay);
    pause.style.display = "none";
    play.style.display = "block";
    position = position;
    console.log(position);
}, false);


//Vérification de la présence d'Adblock 
>>>>>>> 21e096124f2baeb3d435e15e314745c051075d8e
