// Buttons that allow opening modal windows
let modal1 = document.getElementById("modal_opener1");
let modal2 = document.getElementById("modal_opener2");
let modal3 = document.getElementById("modal_opener3");

// Crosses supposed to close modal windo
let close = document.getElementById("close_flight_travelDl");
let close2 = document.getElementById("close_flight_travelDl2");
let close3 = document.getElementById("close_flight_travelDl3");

let body = document.getElementById("body");


// Waits for a click on the modal, opener, then changes body style
modal1.addEventListener("click", function() {
    body.style.overflowY = "hidden";

}, false);

modal2.addEventListener("click", function() {
    body.style.overflowY = "hidden";

}, false);

modal3.addEventListener("click", function() {
    body.style.overflowY = "hidden";

}, false);






// Waits for a click on the modal, opener, then reapply original overflow to body
close.addEventListener("click", function() {
    // Get body
    body.style.overflowY = "auto";

}, false);
close2.addEventListener("click", function() {
    // Get body
    body.style.overflowY = "auto";

}, false);

close3.addEventListener("click", function() {
    // Get body
    body.style.overflowY = "auto";

}, false);