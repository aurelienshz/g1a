var alerts = document.querySelectorAll('.alert'),   // Sélectionne toutes les alertes
    lengthAlerts = alerts.length;

for (var i = 0 ; i<lengthAlerts ; i++) {
    alerts[i].addEventListener('click', function(e) {
        e.target.style.display = 'none';    // C'est quoi e ?
    }, false);
}
