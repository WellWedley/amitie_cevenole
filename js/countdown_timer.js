
function MyTimer(name,countdownDate){
    let timer={} ;
    this.name = name ;


    this.displayTimer= function (){


        this.actualDate = new Date();
        this.countdownDate = countdownDate;
        this.distance = this.countdownDate-this.actualDate ;
        this.days = Math.floor(this.distance / (1000 * 60 * 60 * 24));
        this.hours =Math.floor((this.distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        this.minutes =Math.floor((this.distance % (1000 * 60 * 60)) / (1000 * 60) );
        this.seconds = Math.floor((this.distance % (1000 * 60)) / 1000);
        //récupération des éléments du DOM
        this.days = this.days.toString(10).substr(0, 2);
        this.hours = this.hours.toString(10).substr(0, 2);
        this.minutes = this.minutes.toString(10).substr(0, 2);
        this.seconds = this.seconds.toString(10).substr(0, 2);

        this.daysDisp = document.getElementById('jours');
        this.hoursDisp = document.getElementById('hours');
        this.minutesDisp = document.getElementById('minutes');
        this.secondsDisp = document.getElementById('secondes')

        if (this.days >= 0 && this.hours >= 0 && this.minutes >= 0 &&this.seconds) {
            this.daysDisp.innerHTML = this.days;
            this.hoursDisp.innerHTML = this.hours;
            this.minutesDisp.innerHTML = this.minutes;
            this.secondsDisp.innerHTML = this.seconds;

            function callTimer() {
                setInterval(function () {
                        timer1.displayTimer()
                    }
                    , 1000);

            }

            callTimer();
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

let x = window.addEventListener('scroll',function (e)
{
    let scrollPosition = window.scrollY;
    if (scrollPosition>10)
    {
        console.log(scrollPosition)
        window.requestAnimationFrame(function ()
        {
            timer1.displayTimer(scrollPosition)
        } ) ;
    }



});








// Set the date we're counting down to
/*var countDownDate = new Date("May 01, 2021 23:50:00").getTime();
// Update the count down every 1 second
var x = setInterval(function () {
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result into DOM
   days= document.getElementById("jours");

    document.getElementById("hours").innerHTML = hours.toString(10).substr(0, 2);
    document.getElementById("minutes").innerHTML = minutes.toString(10).substr(0, 2);
    document.getElementById("secondes").innerHTML = seconds.toString(10).substr(0, 2);
    // If the count down is finished, write some text
    if (seconds <= 1) {
        days.innerHTML =' ' ;
        console.log('Hello'+days);
        console.log(hours +' ' );
        console.log(days  +' ' );
        console.log(seconds +' ' );
        clearInterval(x);
        var intro_content = document.getElementsByTagName('intro_content');

        intro_content.innerHTML = "Les séjours on déjà commencé ! ";
    }
}, 1000);*/