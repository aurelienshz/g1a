var alerts = document.querySelectorAll('.alert'),   // Sélectionne toutes les alertes
    lengthAlerts = alerts.length,
    tempsAffichage = 3000; //ms

var fadeOut = function(alert){
    setTimeout(function(){
        var opa = alert.style.opacity;
        if(opa > 0) {
            alert.style.opacity -= 0.05;
            fadeOut(alert);
        }
    },15);
}

function dismiss(alert) {
    alert.style.opacity = 1;
    fadeOut(alert);
    setTimeout(function() {alert.style.display = 'none'; }, 300);
}

for (var i = 0 ; i<lengthAlerts ; i++) {
    // ajout des dmismiss manuels
    alerts[i].addEventListener('click', function(e) {
        dismiss(e.target);
    }, false);

    // auto-dismiss au bout d'un certain temps :
    var wait = [];
    wait[i] = tempsAffichage+1000*i;
    setTimeout('dismiss(alerts['+i+'])',wait[i]);
}
