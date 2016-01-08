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
                        console.log(events[i].categorie);
                    }
                    // on récupère la date :
                    if(events[i].childNodes[j].childNodes[k].className == 'eventDate') {
                        events[i].date = events[i].childNodes[j].childNodes[k].childNodes[1].textContent;
                        console.log(events[i].date);
                    }
                    // on récupère le tarif :
                    if(events[i].childNodes[j].childNodes[k].className == 'eventTarif') {
                        var tarif = events[i].childNodes[j].childNodes[k].childNodes[1].textContent;
                        events[i].tarif = tarif.substring(0, tarif.length - 2);
                        console.log(events[i].tarif);
                    }

                }
            }
        }
    // console.log(events[i]);
    }
}

// var filtersDate = document.querySelectorAll(".filter-date");
// console.log(filtersDate);

// for(var i = 0, c = filtersDate)

}())
