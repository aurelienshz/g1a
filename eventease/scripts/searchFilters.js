(function(){

var events = document.querySelectorAll(".eventPreview");


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
    console.log(filtersType[i]);
    filtersType[i].addEventListener('click',function(e) {
        // Si on a cliqué sur "tous" :
        if(e.target.classList.contains("filter-type-all")) {
            for(var j=0; c=filtersType.length, j<c; j++) {
                filtersType[j].classList.remove("selected");
            }
            e.target.classList.add("selected");
        }
        // Si on a cliqué sur un filtre particulier :
        else {
            // On désactive le "tous" :
            for(var j=0; c=filtersType.length, j<c; j++) {
                if(filtersType[j].classList.contains("filter-type-all")) {
                    filtersType[j].classList.remove("selected");
                }
            }
            e.target.classList.toggle("selected");

            visible.push(e.target.innerText);

            // on compte le nombre de selected et on rallume "tous" si besoin :
            d = 0;
            for(var j=0; c=filtersType.length, j<c; j++) {
                if(filtersType[j].classList.contains("selected")) {
                    d++;
                }
            }
            // Si on a tout déselectionné :
            if(d==0) {
                for(var j=0; c=filtersType.length, j<c; j++) {
                    if(filtersType[j].classList.contains("filter-type-all")) {
                        filtersType[j].classList.add("selected");
                    }
                }
            }

            // for(var j=0; c=filtersType.length, j<c; j++) {
            //     if(filtersType[i].classList.contains("filter-type-all") && filtersType[i].classList.contains("selected")) {
            //         toDisplay["type"] = [];
            //     }
            //     else {
            //         toDisplay["type"].push[filtersType[i].innerText];
            //     }
            // }

        }
    },false);
}

}())
