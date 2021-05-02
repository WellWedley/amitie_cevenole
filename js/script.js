




window.addEventListener('DOMContentLoaded', function manageIntro() {
    let first = document.getElementById('first_circle');
    let second = document.getElementById('second_circle');
    let third = document.getElementById('third_circle');
    let opacity = 0;
    first.style.opacity = opacity;
    second.style.opacity = opacity;
    third.style.opacity = opacity;


    //Refreshes circle's opacity every 500ms
    setTimeout(() => {
        while (opacity < 1) {
            opacity += 0.1;
            first.style.opacity = opacity;
            second.style.opacity = opacity;
            third.style.opacity = opacity;
        }

    }, 500);

}, false);





