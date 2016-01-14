// Filter search results and things

/* ToDo :
    - ajouter la gestion du cas où tous les events ont été cachés
    - ajouter la gestion des dates (aujourd'hui, demain)
*/

function Hider() {

    this.hidden = [];
    this.events = document.querySelectorAll(".eventPreview");
    this.now = new Date();

    this.init = function() {
        var numberEvents = this.events.length;
        if(numberEvents > 0) {
            // on parcourt les évènements :
            for(var i=0; i < numberEvents; i++) {
                for(j in this.events[i].childNodes) {
                    // on récupère les infos pratiques de l'event :
                    if(this.events[i].childNodes[j].className == 'infosPratiques') {
                        for(k in this.events[i].childNodes[j].childNodes) {
                            // on récupère la catégorie :
                            if(this.events[i].childNodes[j].childNodes[k].className == 'eventCategorie') {
                                this.events[i].categorie = this.events[i].childNodes[j].childNodes[k].childNodes[1].textContent;
                            }
                            // on récupère la date :
                            if(this.events[i].childNodes[j].childNodes[k].className == 'eventDate') {
                                var date = {textDate: this.events[i].childNodes[j].childNodes[k].childNodes[1].textContent};
                                date.year = date.textDate.substring(0,4);
                                date.month = date.textDate.substring(5,7);
                                date.day = date.textDate.substring(8,10);
                                // console.log(date);
                                this.events[i].date = date;
                            }
                            // on récupère le tarif :
                            if(this.events[i].childNodes[j].childNodes[k].className == 'eventTarif') {
                                var tarif = this.events[i].childNodes[j].childNodes[k].childNodes[1].textContent;
                                this.events[i].tarif = tarif.substring(0, tarif.length - 2);
                            }

                        }
                    }
                }
            }
        }
    }

    this.toBeHidden = function(filterType, filterValue, filtered) {
        // retourne True si l'objet *doit être caché*
        // pour adapter à d'autres cas : changer les valeurs de "case" et les test à effectuer
        switch(filterType) {
            case 'date':
                console.log(filtered.date);
                console.log(this.now.getFullYear());
                switch(filterValue) {
                    case 'Aujourd\'hui':
                        if(filtered.date.year == this.now.getFullYear() && filtered.date.month == this.now.getMonth() && filtered.date.day == this.now.getDate()) {
                            return true;
                        }
                        else {
                            return false;
                        }
                    break;
                    case 'Demain':
                        var tomorrow = new Date(this.now.getTime() + 86400000);
                        // console.log(tomorrow);
                        if(filtered.date.year == tomorrow.getFullYear() && filtered.date.month == tomorrow.getMonth()) {
                            return true;
                        }
                        else {
                            return false;
                        }
                    break;
                    case 'Mois en cours':
                        if(filtered.date.year == this.now.getFullYear() && filtered.date.month == this.now.getMonth()) {
                            return true;
                        }
                        else {
                            return false;
                        }
                    break;
                    case 'Plus tard':
                        if(filtered.date.year != this.now.getFullYear() || (filtered.date.year == this.now.getFullYear() && filtered.date.month != this.now.getMonth())) {
                            return true;
                        }
                        else {
                            return false;
                        }
                    break;
                }
            break;
            case 'type':
                // pour le type, si la catégorie de l'event est celle du filtre, il faut le refouler à l'entrée :
                if(filtered.categorie == filterValue) {
                    return true;
                }
                else {
                    return false;
                }
            break;
            case 'price':
                if(!isNaN(parseInt(filtered.tarif))) {
                    switch(filterValue) {
                        case '< 10 €':
                            if(parseInt(filtered.tarif) < 10 && parseInt(filtered.tarif) > 0) {
                                return true;
                            }
                            else {
                                return false;
                            }
                        break;
                        case '10 - 50 €':
                            if(parseInt(filtered.tarif) >= 10 && parseInt(filtered.tarif) <= 50) {
                                return true;
                            }
                            else {
                                return false;
                            }
                        break;
                        case '> 50 €':
                            if(parseInt(filtered.tarif) > 50) {
                                return true;
                            }
                            else {
                                return false;
                            }
                        break;
                    }
                }
                else {
                    return false;
                }
            break;
        }
    }


    this.hide = function() {
        for(var i = 0; i < this.events.length; i++) {
            // reset du display / hide :
            this.events[i].style.display = 'block';
            // reset du flag de désaffichage :
            var youShallNotPass = false;
            for(var name in this.hidden) {
                for(var j in this.hidden[name]) {
                    if(this.toBeHidden(name, this.hidden[name][j], this.events[i])) {
                        youShallNotPass = "true";
                    }
                }
            }
            if(youShallNotPass) {
                this.events[i].style.display = 'none';
            }
        }
    }

    this.init();
}

function Filter(name, hider) {

    this.name = name;
    this.filters = document.getElementsByClassName("filter-"+name);

    hider.hidden[name] = [];

    var parent = this;
    for(var i=0; i < this.filters.length; i++) {
        this.filters[i].addEventListener('click',function(e) {
            // on purge la liste des events à cacher : elle sera reconstruite après la fin du filtrage
            hider.hidden[name] = [];
            // Si on a cliqué sur "tous" :
            if(e.target.classList.contains("filter-"+name+"-all")) {
                // on désactive tous les filtres :
                for(var j=0; j<parent.filters.length; j++) {
                    parent.filters[j].classList.remove("selected");
                }
                e.target.classList.add("selected");
            }
            // Si on a cliqué sur un filtre particulier :
            else {
                // On désactive le "tous" :
                for(var j=0; j<parent.filters.length; j++) {
                    if(parent.filters[j].classList.contains("filter-"+name+"-all")) {
                        parent.filters[j].classList.remove("selected");
                    }
                }
                e.target.classList.toggle("selected");

                // on compte le nombre de selected pour rallumer "tous" si besoin :
                var compteur = 0;
                for(var j=0; j<parent.filters.length; j++) {
                    if(parent.filters[j].classList.contains("selected")) {
                        compteur++;
                    }
                }
                // Si on a tout déselectionné :
                if(compteur==0) {
                    for(var j=0; j<parent.filters.length; j++) {
                        if(parent.filters[j].classList.contains("filter-"+name+"-all")) {
                            parent.filters[j].classList.add("selected");
                        }
                    }
                }
            }

            for(var j=0; j<parent.filters.length; j++) {
                // Si on rencontre le filtre Tous et qu'il est activé, on quitte la boucle en ne cachant rien :
                if(parent.filters[j].classList.contains("filter-"+name+"-all") && parent.filters[j].classList.contains('selected')) {
                    // on vide la liste de filtres du hider :
                    hider.hidden[name] = [];
                    // on quitte la boucle :
                    break;
                }
                // Sinon, on charge la liste des cachés avec tous les filtres qui sont désactivés :
                else if(!parent.filters[j].classList.contains('selected') && !parent.filters[j].classList.contains("filter-"+name+"-all")) {
                    hider.hidden[name].push(parent.filters[j].innerText);
                }
            }

            // console.log(hider.hidden);
            hider.hide();
        },false);   // ./event listener
    }   // ./for
}   // ./Filter

var hider = new Hider;

var filterType = new Filter('type', hider);
var filterDate = new Filter('date', hider);
var filterPrice = new Filter('price', hider);
