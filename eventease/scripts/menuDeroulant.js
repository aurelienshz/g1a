var linksMenu = document.querySelectorAll('.menuTrigger > a'),   // Sélectionne toutes les alertes
    numberLinks = linksMenu.length;

for (var i = 0 ; i < numberLinks ; i++) {
    linksMenu[i].addEventListener('click', function(e) {
        e.preventDefault();
    }, false);
}
