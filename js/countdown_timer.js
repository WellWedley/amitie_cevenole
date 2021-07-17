// Set the date we're counting down to
let countDownDate = new Date("Jul 24, 2021 11:00:00").getTime();
// let countDownDate = new Date("Jul 24, 2021 11:00:00").getTime();


let daysSubt = document.getElementById('daySubt');
let hoursSubt = document.getElementById('hourSubt');
let minuteSubt = document.getElementById('minuteSubt');
let secondSubt = document.getElementById('secondSubt');

let opacity = 0;

// Update the count down every 1 second
let x = setInterval(function() {

    opacity = 1;

    daysSubt.style.opacity = opacity;
    hoursSubt.style.opacity = opacity;
    minuteSubt.style.opacity = opacity;
    secondSubt.style.opacity = opacity;

    let now = new Date().getTime();
    // Find the distance between now and the count down date
    let distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Displays the result in the element with id="jours","minutes","secondes"
    document.getElementById("jours").innerHTML = days;
    console.log(days);
    document.getElementById("hours").innerHTML = hours.toString(10).substr(0, 2);
    document.getElementById("minutes").innerHTML = minutes.toString(10).substr(0, 2);
    document.getElementById("secondes").innerHTML = seconds.toString(10).substr(0, 2);
    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Les séjours on déjà commencé ! ";
    }
}, 1000);