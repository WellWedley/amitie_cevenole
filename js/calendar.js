
let calendar = {
    years: [2021, 2022, 2023],
    months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    days: [],

    // displays the dates params to the user 
    displaydates: function (years, months, days) {
        years = this.years;
        months = this.months;
        let yearSelect = document.getElementById('year_dep_sel');
        let yearLabelName = document.getElementById('year_dep_label');
        yearLabelName.innerHTML = 'Année : ';

        let monthSelect = document.getElementById('month_dep_sel');
        let monthLabelName = document.getElementById('month_dep_label');
        monthLabelName.innerHTML = 'Mois : ';


        for (let i = 0; i < this.years.length; i++) {

            // Creates a new option elem for each year
            let Yoption = document.createElement('option');
            Yoption.innerHTML = years[i];
            yearSelect.appendChild(Yoption);
        }

        for (let i = 0; i < this.months.length; i++) {

            // Creates a new option elem for each year
            let Moption = document.createElement('option');
            Moption.innerHTML = months[i];
            monthSelect.appendChild(Moption);
        }




    },

    createCalendar: function () {


    },


    afficheDate: function () {
        alert(this.years + ' ' + this.months[1]);
    },
    salutation: function () {
        alert('Bonjour ! Je suis ' + this.nom[0] + '.');
    }
};


monaffichage = calendar.displaydates();


