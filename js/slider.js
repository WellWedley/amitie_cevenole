var position = 0;

var slider = document.getElementById("slider");
var slide = document.getElementById("gallery_wrapper");
var previous = document.getElementById("previous_wrapper");
var next = document.getElementById("next_wrapper");
var nb_img = 27;
var play = document.getElementsByClassName("play");
var pause = document.getElementsByClassName("pause");
window.addEventListener("DOMContentLoaded", function createImg() {

    let array_img = { src: [] };
    for (let index_img = 1; index_img < nb_img; index_img++) {
        array_img.src[index_img] = index_img;
        slide.innerHTML += '<div class="img_wrap"> <img src=\"./img/photos_sejours/' + index_img + '.jpeg" alt="Photo des séjours de l\'année 2020"></div>';
    }

}, false);

previous.addEventListener("click", function previousSlider() {
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

// Fonction qui lance automatiquement les diapositive toutes les 6 secondes
var autoslide = setInterval(function () {
    if (position >= nb_img / -.33) {
        position -= nb_img / 3;
   //     console.log(position);
        slide.style.transform = "translateX(" + position + "%)";
        slide.style.mstransform = "translate(" + position + "%)";
    }
    else {
        clearInterval
    }
}, 6000);



