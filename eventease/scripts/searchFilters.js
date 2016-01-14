(function(){

var events = document.querySelectorAll(".eventPreview"),
    today = new Date(),
    dd = today.getDate(),
    mm = today.getMonth()+1,
    yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd;
}
if(mm<10) {
    mm='0'+mm;
}

today = yyyy+'-'+mm+'-'+dd;
console.log(today);

var toHide = function(filter, event) {
    switch(filter) {
        case 'price':

    }
}


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

// var filterType = {document.getElementsByClassName("filter-type")},
//     filterDate = document.getElementsByClassName("filter-date"),
//     filterPrice = document.getElementsByClassName("filter-price");
var Filter = {},
    names = ['type', 'date', 'price'];

for(var f in names) {

    var name = names[f];

    Filter[name] = {filters: document.getElementsByClassName("filter-"+name), hidden: []};

}

for(var name in Filter) {
    console.log(Filter[name]);

    for(var i=0; c=Filter[name].filters.length, i<c; i++) {
        Filter[name].filters[i].addEventListener('click',function(e) {
            // on purge la liste des events à cacher : elle sera reconstruite après la fin du filtrage
            Filter[name].hidden = [];
            // Si on a cliqué sur "tous" :
            if(e.target.classList.contains("filter-"+name+"-all")) {
                console.log('jaja');
                // on désactive tous les filtres :
                for(var j=0; j<c; j++) {
                    filters[name][j].classList.remove("selected");
                }
                e.target.classList.add("selected");
            }
            // Si on a cliqué sur un filtre particulier :
            else {
                // On désactive le "tous" :
                for(var j=0; j<c; j++) {
                    if(filters[name][j].classList.contains("filter-"+name+"-all")) {
                        filters[name][j].classList.remove("selected");
                    }
                }
                e.target.classList.toggle("selected");

                // on compte le nombre de selected pour rallumer "tous" si besoin :
                var compteur = 0;
                for(var j=0; j<c; j++) {
                    if(filters[name][j].classList.contains("selected")) {
                        compteur++;
                    }
                }
                // Si on a tout déselectionné :
                if(compteur==0) {
                    for(var j=0; j<c; j++) {
                        if(filters[name][j].classList.contains("filter-"+name+"-all")) {
                            filters[name][j].classList.add("selected");
                        }
                    }
                }
            }

            for(var j=0; j<c; j++) {
                // Si on rencontre le filtre Tous et qu'il est activé, on quitte la boucle en ne cachant rien :
                if(filters[name][j].classList.contains("filter-"+name+"-all") && filters[name][j].classList.contains('selected')) {
                    hidden[name] = [];
                    break;
                }
                // Sinon, on charge la liste des cachés avec tous les filtres qui sont désactivés :
                else if(!filters[name][j].classList.contains('selected') && !filters[name][j].classList.contains("filter-"+name+"-all")) {
                    hidden[name].push(filters[name][j].innerText);
                }
            }
            console.log(hidden[name]);

            for(var j=0; j < numberEvents; j++) {
                // Si on trouve la catégorie de l'event dans la liste des catégories à cacher :
                if(hidden[name].indexOf(events[j].categorie) >= 0) {
                    // console.log(hidden[filter].indexOf(events[j].categorie));
                    events[j].style.display = 'none';
                }
                else {
                    events[j].style.display = 'block';
                }
            }

        },false);
    }
}

}())
