/*

// Function that handles timers
function MyTimer(name,countdownDate){
    let timer={} ;
    this.name = name ;
    this.opacity = 0 ;


    this.daysSubt = document.getElementById('daySubt');
    this.hoursSubt = document.getElementById('hourSubt');
    this.minuteSubt = document.getElementById('minuteSubt');
    this.secondSubt = document.getElementById('secondSubt');

    this.daysSubt.style.opacity = this.opacity;
    this.hoursSubt.style.opacity = this.opacity;
    this.minuteSubt.style.opacity =this.opacity;
    this.secondSubt.style.opacity = this.opacity;
    //
    this.displayTimer= function (){
        this.actualDate = new Date();
        this.countdownDate = countdownDate;
        this.distance = this.countdownDate-this.actualDate ;
        this.days = Math.floor(this.distance / (1000 * 60 * 60 * 24));
        this.hours =Math.floor((this.distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        this.minutes =Math.floor((this.distance % (1000 * 60 * 60)) / (1000 * 60) );
        this.seconds = Math.floor((this.distance % (1000 * 60)) / 1000);
        //declarations of actual date +  end date

        //splitting the values of the dates to display them into DOM
        this.days = this.days.toString(10).substr(0, 2);
        this.hours = this.hours.toString(10).substr(0, 2);
        this.minutes = this.minutes.toString(10).substr(0, 2);
        this.seconds = this.seconds.toString(10).substr(0, 2);

        //Getting DOM elements
        this.daysDisp = document.getElementById('jours');
        this.hoursDisp = document.getElementById('hours');
        this.minutesDisp = document.getElementById('minutes');
        this.secondsDisp = document.getElementById('secondes');


        this.opacity = 1 ;

        this.daysSubt.style.opacity = this.opacity;
        this.hoursSubt.style.opacity = this.opacity;
        this.minuteSubt.style.opacity =this.opacity;
        this.secondSubt.style.opacity = this.opacity;

        //Checks if the countdown is finished or not
        if (this.days >= 0 && this.hours >= 0 && this.minutes >= 0 &&this.seconds) {
            this.daysDisp.innerHTML = this.days;
            this.hoursDisp.innerHTML = this.hours;
            this.minutesDisp.innerHTML = this.minutes;
            this.secondsDisp.innerHTML = this.seconds;



            // function  that calls itself every second in order to actualize timers

                setInterval(function () {
                        timer1.displayTimer()
                        //displays the subtitles once numbers are displayed

                    }
                    , 1000);
        }

        else if(this.days<1)
        {
            this.hoursDisp.innerHTML = this.hours;
            this.minutesDisp.innerHTML = this.minutes;
            this.secondsDisp.innerHTML = this.seconds;
        }
    }

}


let timerName = 'Timer1';

let countdownDate= new Date("Jul 10, 2021 11:00:00").getTime();

let timer1 = new MyTimer(timerName,countdownDate ) ;


 window.addEventListener('DOMContentLoaded',function startTimer()
{
            timer1.displayTimer() ;

},false);*/



// Set the date we're counting down to
let countDownDate = new Date("Jul 10, 2021 11:00:00").getTime();


let daysSubt = document.getElementById('daySubt');
let hoursSubt = document.getElementById('hourSubt');
let minuteSubt = document.getElementById('minuteSubt');
let secondSubt = document.getElementById('secondSubt');

let opacity  = 0 ;


// Update the count down every 1 second
let x = setInterval(function () {

     opacity = 1 ;

    daysSubt.style.opacity = opacity;
    hoursSubt.style.opacity = opacity;
    minuteSubt.style.opacity =opacity;
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