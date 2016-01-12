(function(){

var events = document.querySelectorAll(".eventPreview"),
    hidden = {typeEvent: []};


var numberEvents = events.length;
if(numberEvents > 0) {
    // on parcourt les évènements :
    for(var i=0; i < numberEvents; i++) {
        for(j in events[i].childNodes) {
            // on récupère les infos pratiques de l'event :
            if(events[i].childNodes[j].className == 'infosPratiques') {
                for(k in events[i].childNodes[j].childNodes) {
                    // on récupère la catégorie :
                    if(events[i].childNodes[j].childNodes[k].className == 'eventCategorie') {
                        events[i].categorie = events[i].childNodes[j].childNodes[k].childNodes[1].textContent;
                        // console.log(events[i].categorie);
                    }
                    // on récupère la date :
                    if(events[i].childNodes[j].childNodes[k].className == 'eventDate') {
                        events[i].date = events[i].childNodes[j].childNodes[k].childNodes[1].textContent;
                        // console.log(events[i].date);
                    }
                    // on récupère le tarif :
                    if(events[i].childNodes[j].childNodes[k].className == 'eventTarif') {
                        var tarif = events[i].childNodes[j].childNodes[k].childNodes[1].textContent;
                        events[i].tarif = tarif.substring(0, tarif.length - 2);
                        // console.log(events[i].tarif);
                    }

                }
            }
        }
    // console.log(events[i]);
    }
}

var filtersType = document.querySelectorAll(".filter-type");
for(var i=0; c=filtersType.length, i<c; i++) {
    // console.log(filtersType[i]);
    filtersType[i].addEventListener('click',function(e) {
        // on purge la liste des events à cacher : elle sera reconstruite après la fin du filtrage
        hidden.typeEvent = [];
        // Si on a cliqué sur "tous" :
        if(e.target.classList.contains("filter-type-all")) {
            // on désactive tous les filtres :
            for(var j=0; j<c; j++) {
                filtersType[j].classList.remove("selected");
            }
            e.target.classList.add("selected");
        }
        // Si on a cliqué sur un filtre particulier :
        else {
            // On désactive le "tous" :
            for(var j=0; j<c; j++) {
                if(filtersType[j].classList.contains("filter-type-all")) {
                    filtersType[j].classList.remove("selected");
                }
            }
            e.target.classList.toggle("selected");

            // on compte le nombre de selected pour rallumer "tous" si besoin :
            var compteur = 0;
            for(var j=0; j<c; j++) {
                if(filtersType[j].classList.contains("selected")) {
                    compteur++;
                }
            }
            // Si on a tout déselectionné :
            if(compteur==0) {
                for(var j=0; j<c; j++) {
                    if(filtersType[j].classList.contains("filter-type-all")) {
                        filtersType[j].classList.add("selected");
                    }
                }
            }
        }

        for(var j=0; j<c; j++) {
            // Si on rencontre le filtre Tous et qu'il est activé, on quitte la boucle en ne cachant rien :
            if(filtersType[j].classList.contains('filter-type-all') && filtersType[j].classList.contains('selected')) {
                hidden.typeEvent = [];
                break;
            }
            // Sinon, on charge la liste des cachés avec tous les filtres qui sont désactivés :
            else if(!filtersType[j].classList.contains('selected') && !filtersType[j].classList.contains('filter-type-all')) {
                hidden.typeEvent.push(filtersType[j].innerText);
            }
        }
        // console.log(hidden.typeEvent);

        for(var j=0; j < numberEvents; j++) {
            if(hidden.typeEvent.indexOf(events[j].categorie) >= 0) {
                // console.log(hidden.typeEvent.indexOf(events[j].categorie));
                events[j].style.display = 'none';
            }
            else {
                events[j].style.display = 'block';
            }
        }

    },false);
}

}())
