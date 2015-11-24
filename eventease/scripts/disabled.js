var disabled = document.querySelectorAll('.disabled'),   // Sélectionne toutes les alertes
    numberDisabled = disabled.length;

for (var i = 0 ; i < numberDisabled ; i++) {
    disabled[i].addEventListener('click', function(e) {
        e.preventDefault();
    }, false);
}
