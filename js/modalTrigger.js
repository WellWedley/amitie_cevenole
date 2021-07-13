// Listen for event on modal to enable/disable body overflow
let popup = document.getElementsByClassName("overlay_flight_traveldil");
let body = document.querySelector(".disable-scroll");
let isModalClosed = document.getElementById("#close_text");
let isModalClosed2 = document.getElementsByClassName("close_logo");

if (popup.visibility === "visible") {
    console.log(popup.visibility)
} else {
    console.log(popup.visibility)
    console.log('hidden')

}


const currentUrl = window.location.href;



window.addEventListener("DOMContentLoaded", function dealModals() {




}, false)
body.addEventListener('click', function removeOverflow() {
    console.log(21)

    if (currentUrl.search('modal') != -1) {
        console.log('yesss')


    } else {
        console.log('no');
    }
    console.log("received")
}, false)