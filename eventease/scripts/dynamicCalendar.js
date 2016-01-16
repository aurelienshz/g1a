/*
Bonjour !
Si tu es celui qui cherche pourquoi le jour affiché n'est pas dans le mois en cours, regarde à la ligne 66 :
on affiche le premier jour où il y a des events sans se préoccuper du mois en cours. Oui, c'est dégueu. Oui, tu peux corriger si tu veux. Mais tu vas devoir réécrire les 2/3 du script.
Amour. Aurélien.
*/

(function() {
    var monthDetails = document.getElementsByClassName('monthDetails'),
        monthCalendars = document.getElementsByClassName('calendar'),
        eventSelect = document.getElementsByClassName('eventSelect'),
        nextMonth = document.getElementsByClassName('next-month'),
        previousMonth = document.getElementsByClassName('previous-month'),
        calendarDays = document.querySelectorAll('.calendar td a'),
        daysDetails = document.querySelectorAll('.monthDetails > div'),
        currentMonth = 0;

    HTMLCollection.prototype.last = function() {
        return this[this.length-1];
    }

    // On ajoute la méthode


    // Fonctions à appeler pour passer au mois suivant ou au mois précédent :
    // on peut grandement améliorer en se servant des classes .row
    var showNextMonth = function(element) {
        monthDetails[currentMonth].style.display = 'none';
        monthCalendars[currentMonth].style.display = 'none';
        currentMonth += 1;
        monthCalendars[currentMonth].style.display = 'table-cell';
        monthDetails[currentMonth].style.display = 'table-cell';
        if(getFirstFilledDay()) {showDay(getFirstFilledDay())};
    }
    var showPreviousMonth = function(element) {
        monthDetails[currentMonth].style.display = 'none';
        monthCalendars[currentMonth].style.display = 'none';
        currentMonth -= 1;
        monthCalendars[currentMonth].style.display = 'table-cell';
        monthDetails[currentMonth].style.display = 'table-cell';
        if(getFirstFilledDay()) {showDay(getFirstFilledDay())};
    }

    var getFirstFilledDay = function() {
        var day = false;
        for(var i = 0; i<monthDetails[currentMonth].childNodes.length; i++) {
            if(monthDetails[currentMonth].childNodes[i].tagName == "DIV") {
                day = showDay(monthDetails[currentMonth].childNodes[i]);
            }
        }
        if(day) {
            return day;
        }
        else {
            return false;
        }
    }

    // Affiche uniquement le jour passé en param
    var showDay = function(dayElement) {
        // On passe tout le monde en invisible...
        for(var i = 0, c = daysDetails.length; i<c; i++) {
            daysDetails[i].style.display = 'none';
        }
        // sauf celui qu'on veut !
        dayElement.style.display = 'block';
    }


    // Cacher le bouton previous du premier mois et le bouton next du dernier mois :
    previousMonth[0].style.display = "none";
    nextMonth.last().style.display = "none";

    // Masquer tous les mois (détails et calendriers)
    // Peut être simplifié en utilisant la classe .row ! ;)
    for(var i=0, c=monthDetails.length; i<c; i++) {
        monthDetails[i].style.display = 'none';
    }
    for(var i=0, c=monthCalendars.length; i<c; i++) {
        monthCalendars[i].style.display = 'none' ;
    }
    // Masquer tous les jours :
    for(var i = 0, c = daysDetails.length; i<c; i++) {
        daysDetails[i].style.display = 'none';
    }

    // Réafficher le premier mois et le détail dudit mois :
    monthCalendars[0].style.display = 'table-cell';
    monthDetails[0].style.display = 'table-cell';

    daysDetails[0].style.display = 'block';


    // Ajouter les event listeners sur les actions mois précédent / mois suivant :
    for(i=0, c=nextMonth.length; i<c; i++) {
        nextMonth[i].addEventListener('click',function(e) {
            showNextMonth();
            e.preventDefault();
        },false);
    }
    for(i=0, c=previousMonth.length; i<c; i++) {
        previousMonth[i].addEventListener('click',function(e) {
            showPreviousMonth();
            e.preventDefault();
        },false);
    }

    // Ajouter des event listeners à tous les jours du calendrier :
    for(i=0, c=calendarDays.length; i<c; i++) {
        calendarDays[i].addEventListener('click',function(e) {
            // Si le jour cliqué est rempli, on affiche le détail de ce jour
            if(e.target.className=='filled-day') {
                var dayToDisplay = document.getElementById(e.target.getAttribute('href').substring(1)); //Substring pour virer le #
                showDay(dayToDisplay);
            }
            e.preventDefault;
        },false);
    }




}
)();
